function toggleCordiBot() {
    document.getElementById('cordibot-window').classList.toggle('d-none');
  }
  
  function appendMessage(sender, message) {
    const messages = document.getElementById('cordibot-messages');
    const msgDiv = document.createElement('div');
    msgDiv.innerHTML = `<div class="sender-info"><strong>${sender}</strong></div><p>${message}</p>`;
    messages.appendChild(msgDiv);
    messages.scrollTop = messages.scrollHeight;
  }
  
  function sendOption(option) {
    appendMessage("You", option);
  
    fetch('/cordibot/message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
      },
      body: JSON.stringify({ message: option })
    })
    .then(res => res.json())
    .then(data => {
      appendMessage("CordiBot", data.reply);
    });
  }
  
  function sendMessage() {
    const input = document.getElementById('cordibot-input');
    const message = input.value;
    if (!message) return;
  
    appendMessage("You", message);
    input.value = '';
  
    fetch('/cordibot/message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
      },
      body: JSON.stringify({ message })
    })
    .then(res => res.json())
    .then(data => {
      appendMessage("CordiBot", data.reply);
    });
  }
  