function selectPayment(option) {
    const paymongo = document.getElementById("opt-paymongo");
    const proof = document.getElementById("opt-proof");

    if (option === 'paymongo') {
        paymongo.classList.add("selected");
        proof.classList.remove("selected");
        paymongo.querySelector('input').checked = true;
    } else if (option === 'proof') {
        proof.classList.add("selected");
        paymongo.classList.remove("selected");
        proof.querySelector('input').checked = true;
    }
}

function focusDateInput(icon) {
    const input = icon.previousElementSibling;
    if (input.showPicker) {
        input.showPicker();
    }
    input.focus();
}
