    // validate Mobile Number
function validateMobile(event) {
    const mobileInput = document.getElementById('mobile');
    const messageElement = document.getElementById('message');
    const regex = /^[6789]\d{0,9}$/; // Allow partial numbers for validation as typing progresses

    // Check the entire value of the input along with the newly typed character
    let proposedValue = mobileInput.value + (event.key ?? '');
    if (!regex.test(proposedValue)) {
        messageElement.textContent = "Invalid input. Mobile number must start with 7, 8, or 9 and be up to 10 digits.";
        messageElement.style.color = "red";
        event.preventDefault(); // Stop the character from being input
    } else {
        messageElement.textContent = "";
    }
}
