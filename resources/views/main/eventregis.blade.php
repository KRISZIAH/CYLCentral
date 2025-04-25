@extends('layouts.main')

@section('content')

<!-- Section 1 -->
<section class="section-1">
    <h1>Event Registration Form</h1>
    <div class="line"></div>
</section>

<!-- Section 2 -->
<section class="section-2 py-5">
    <div class="container">
        <!-- First Container -->
        <div class="first-container">
            <div class="floating-header">
                <p>EPISODE 42: LABOR LAWS ON COMPENSATION, BENEFITS, LEAVES AND GRIEVANCES</p>
            </div>
        </div>
        <!-- Second Container -->
        <div class="second-container form-instruction">
            <p>Please fill out the form below to register for the event</p>
        </div>
        <!-- Third & Fourth Container -->
        <div class="row">
            <div class="col-md-8">
                <!-- Form Container -->
                <div class="form-container">
                    <div class="row mb-3">
                        <div class="col">
                            <p>First Name <span class="required-asterisk">*</span></p>
                            <input type="text" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <p>Last Name <span class="required-asterisk">*</span></p>
                            <input type="text" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Birthdate <span class="required-asterisk">*</span></p>
                            <div class="date-input-wrapper">
                                <input type="date" class="form-control birthdate-input" required>
                                <span class="material-icons calendar-icon" onclick="focusDateInput(this)">calendar_month</span>
                            </div>
                        </div>                          
                        <div class="col">
                            <p>Region <span class="required-asterisk">*</span></p>
                            <select class="form-select">
                                <option selected disabled>Select here</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Province <span class="required-asterisk">*</span></p>
                            <select class="form-select">
                                <option value="" selected disabled>Select here</option>
                                <option value="student" required>Abra</option>
                                <option value="employed" required>Apayao</option>
                                <option value="unemployed" required>Baguio</option>
                                <option value="student" required>Benguet</option>
                                <option value="employed" required>Ifugao</option>
                                <option value="unemployed" required>Kalinga</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Employment Status <span class="required-asterisk">*</span></p>
                            <select class="form-select">
                                <option value="" selected disabled>Select here</option>
                                <option value="student" required>Student</option>
                                <option value="employed" required>Employed</option>
                                <option value="unemployed" required>Unemployed</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Company/Institution <span class="required-asterisk">*</span></p>
                            <input type="text" class="form-control" placeholder="Company/Institution" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Contact Number <span class="required-asterisk">*</span></p>
                            <input type="text" class="form-control" placeholder="+63" required>
                        </div>
                        <div class="col">
                            <p>Email Address <span class="required-asterisk">*</span></p>
                            <input type="email" class="form-control" placeholder="youname@gmail.com" required>
                        </div>
                    </div>
                </div>

                <!-- Payment Container -->
                <div class="payment-container">
                    <p class="mb-3">
                        Please pay your application fee of 
                        <span class="app-fee">Fifty Pesos (PHP 50.00)</span> 
                        <span class="required-asterisk">*</span>
                    </p>
                    
                    <div class="radio-options-wrapper">
                        <!-- PayMongo Option -->
                        <div class="radio-option" onclick="selectPayment('paymongo')" id="opt-paymongo">
                            <div class="radio-header">
                                <div class="radio-left">
                                    <input type="radio" name="payment" id="paymongo">
                                    <label for="paymongo" class="paymongo-label">PayMongo</label>
                                </div>
                                <img src="images/paymongo.png" alt="PayMongo" class="paymongo-logo">
                            </div>
                            <p class="small">
                                After clicking "Pay now", you will be redirected to Secure Payments via PayMongo to complete your payment securely.
                            </p>
                        </div>
                    
                        <!-- Upload Proof Option -->
                        <div class="radio-option upload-option" onclick="selectPayment('proof')" id="opt-proof">
                            <div class="radio-left">
                                <input type="radio" name="payment" id="upload">
                                <label for="upload" class="upload-label">Upload Proof of Payment</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <span class="total">Total</span>
                        <p class="fifty-total">P 50.00</p>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <button class="btn-pay">PAY NOW</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-column gap-3">
                <button class="btn btn-submit">SUBMIT</button>
                <button class="btn btn-clear">CLEAR FORM</button>
            </div>
        </div>
    </div>
</section>

@endsection