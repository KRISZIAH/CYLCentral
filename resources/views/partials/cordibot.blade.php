<div id="cordibot-container">
  <div id="cordibot-icon" onclick="toggleCordiBot()">
    <img src="/img/cordibot/cordibot.gif" alt="CordiBot Icon">
  </div>

  <div id="cordibot-window" class="card d-none">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <img src="/images/cordibot-icon.png" class="me-2" style="width: 30px;">
        <div>
          <div><strong>Ask CordiBot</strong></div>
          <small id="cordibot-status" class="text-success">Online</small>
        </div>
      </div>
      <button class="btn btn-sm btn-link text-white" onclick="toggleCordiBot()">&times;</button>
    </div>

    <div class="card-body" id="cordibot-messages">
      <div class="cordibot-message">
        <div class="sender-info">
          <img src="/images/cordibot-icon.png" style="width: 25px;" class="me-2">
          <strong>CordiBot</strong>
        </div>
        <p>Hello!👋 I'm CordiBot, your smart bot from CYLC. Feel free to ask me anything about CYLCentral, from our events, being a member and more. Let me know how I can help!</p>
        <div class="d-flex gap-2 mt-2">
          <button class="btn btn-outline-primary btn-sm" onclick="sendOption('FAQs')">FAQs</button>
          <button class="btn btn-outline-secondary btn-sm" onclick="sendOption('Live Support')">Live Support</button>
        </div>
      </div>
    </div>

    <div class="card-footer d-flex">
      <input type="text" id="cordibot-input" class="form-control me-2" placeholder="Type a message...">
      <button class="btn btn-primary" onclick="sendMessage()">Send</button>
    </div>
  </div>
</div>