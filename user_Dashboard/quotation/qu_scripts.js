// Simulate getting quotation data (this could be dynamic if connected to a backend)
function fetchQuotation() {
    // In real implementation, you would fetch this data from the server
    const serviceType = localStorage.getItem("serviceType");
    const chosenPlan = localStorage.getItem("chosenPlan");
    const fullName = localStorage.getItem("fullName");
    
    let quotationMessage = '';

    if (serviceType && chosenPlan && fullName) {
        quotationMessage = `
            <h3>Quotation for ${fullName}</h3>
            <p><strong>Service Type:</strong> ${serviceType.charAt(0).toUpperCase() + serviceType.slice(1)}</p>
            <p><strong>Chosen Plan:</strong> ${chosenPlan === 'company_decide' ? 'Company Decided Plan' : 'Custom Plan'}</p>
            <p><strong>Estimated Cost:</strong> $${Math.floor(Math.random() * 1000) + 100}</p>
            <p><strong>Validity:</strong> 30 Days</p>
            <p><strong>Next Steps:</strong> After approval, the service will be scheduled.</p>
        `;
    } else {
        quotationMessage = "<p>No request found. Please fill in your service request form first.</p>";
    }

    document.getElementById("quotationSection").innerHTML = quotationMessage;
}

// Call the function when the page loads to simulate fetching the quotation
window.onload = fetchQuotation;
