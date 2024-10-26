document.getElementById('calculateBtn').addEventListener('click', function() {
    const kwInput = document.getElementById('kwInput').value;
    const resultElement = document.getElementById('result');

    // Check if input is valid
    if (kwInput && kwInput > 0) {
        const units = kwInput * 110; // Multiply by 110 to calculate units
        resultElement.textContent = `Units: ${units}`;
    } else {
        resultElement.textContent = 'Please enter a valid KW value.';
    }
});
