document.getElementById('calculateBtn').addEventListener('click', function() {
    const unitsInput = document.getElementById('unitsInput').value;
    const resultElement = document.getElementById('result');

    if (unitsInput && unitsInput > 0) {
        const kW = unitsInput / 110; 
        resultElement.textContent = `kW: ${kW.toFixed(2)}`;
    } else {
        resultElement.textContent = 'Please enter a valid unit value.';
    }
});
