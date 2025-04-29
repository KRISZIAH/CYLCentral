<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::where('status', 'published')
                          ->orderBy('created_at', 'desc')
                          ->paginate(5);
        return view('admin.db_programs', compact('programs'));
    }

    /**
     * Display a listing of draft programs.
     */
    public function drafts()
    {
        $programs = Program::where('status', 'draft')
                          ->orderBy('created_at', 'desc')
                          ->paginate(5);
        return view('admin.db_program_drafts', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.db_newprogram');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Increased to 5MB
            'director_id' => 'nullable|exists:users,id',
        ]);
        
        $program = new Program();
        $program->name = $request->name;
        $program->description = $request->description;
        $program->type = $request->type;
        $program->created_by = Auth::guard('admin')->user()->name ?? 'Admin';
        $program->participants_count = 0;
        
        // Set status based on which button was clicked
        $program->status = $request->input('status', 'published');
        
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('programs', 'public');
            $program->logo_path = $logoPath;
        }
        
        // Assign director if provided
        if ($request->filled('director_id')) {
            $program->director_id = $request->director_id;
            
            // Update user role to Program Director
            $user = User::find($request->director_id);
            if ($user) {
                $user->role = 'Program Director';
                $user->save();
            }
        }
        
        $program->save();
        
        $message = $program->status === 'draft' ? 'Program saved as draft' : 'Program published successfully';
        return redirect()->route('programs.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program_details', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.edit_program', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Increased to 5MB
            'director_id' => 'nullable|exists:users,id',
        ]);
        
        $program = Program::findOrFail($id);
        $program->name = $request->name;
        $program->description = $request->description;
        $program->type = $request->type;
        
        // Update status based on which button was clicked
        if ($request->has('status')) {
            $program->status = $request->status;
        }
        
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($program->logo_path) {
                Storage::disk('public')->delete($program->logo_path);
            }
            
            $logoPath = $request->file('logo')->store('programs', 'public');
            $program->logo_path = $logoPath;
        }
        
        // Handle director change
        if ($request->filled('director_id') && $program->director_id != $request->director_id) {
            // Update previous director's role if needed
            if ($program->director_id) {
                $oldDirector = User::find($program->director_id);
                if ($oldDirector && $oldDirector->role === 'Program Director') {
                    // Check if they're not directing any other programs
                    $otherPrograms = Program::where('director_id', $program->director_id)
                                          ->where('id', '!=', $id)
                                          ->count();
                    if ($otherPrograms === 0) {
                        $oldDirector->role = 'Member'; // Reset to default role
                        $oldDirector->save();
                    }
                }
            }
            
            // Set new director
            $program->director_id = $request->director_id;
            
            // Update new director's role
            $newDirector = User::find($request->director_id);
            if ($newDirector) {
                $newDirector->role = 'Program Director';
                $newDirector->save();
            }
        }
        
        $program->save();
        
        $message = $program->status === 'draft' ? 'Program saved as draft' : 'Program updated successfully';
        return redirect()->route('programs.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        
        // Delete logo if exists
        if ($program->logo_path) {
            Storage::disk('public')->delete($program->logo_path);
        }
        
        $program->delete();
        
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully');
    }
}
