document.getElementById('calculateBtn').addEventListener('click', function() {
    const kwInput = document.getElementById('kwInput').value;
    const resultElement = document.getElementById('result');

  
    if (kwInput && kwInput > 0) {
        const units = kwInput * 110; 
        resultElement.textContent = `Units: ${units}`;
    } else {
        resultElement.textContent = 'Please enter a valid KW value.';
    }
});
