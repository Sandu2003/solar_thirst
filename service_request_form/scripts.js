function togglePaymentFields() {
    const loanOption = document.getElementById("loanOption").value;
    const paymentSection = document.getElementById("paymentSection");
    const loanSection = document.getElementById("loanSection");

    if (loanOption === "yes") {
        paymentSection.style.display = "none";
        loanSection.style.display = "block";
        document.getElementById("paymentReceipt").removeAttribute("required");
        document.getElementById("loanReceipt").setAttribute("required", "required");
    } else {
        paymentSection.style.display = "block";
        loanSection.style.display = "none";
        document.getElementById("loanReceipt").removeAttribute("required");
        document.getElementById("paymentReceipt").setAttribute("required", "required");
    }
}

function toggleCustomPlanField() {
    const chosenPlan = document.getElementById("chosenPlan").value;
    const customPlanSection = document.getElementById("customPlanSection");

    if (chosenPlan === "custom") {
        customPlanSection.style.display = "block";
        document.getElementById("customPlanText").setAttribute("required", "required");
    } else {
        customPlanSection.style.display = "none";
        document.getElementById("customPlanText").removeAttribute("required");
    }
}

function showSuccessMessage(event) {
    event.preventDefault();
    alert("Request submitted successfully!");
    document.getElementById("serviceRequestForm").submit();
}

document.getElementById("loanOption").addEventListener("change", togglePaymentFields);
document.getElementById("chosenPlan").addEventListener("change", toggleCustomPlanField);
document.getElementById("serviceRequestForm").addEventListener("submit", showSuccessMessage);
