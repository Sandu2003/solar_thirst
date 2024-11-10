function toggleInstallationFields() {
    const serviceType = document.getElementById("serviceType").value;
    const installationFields = document.getElementById("installationFields");

    installationFields.style.display = serviceType === "installation" ? "block" : "none";
}

function togglePaymentFields() {
    const loanOption = document.getElementById("loanOption").value;
    const loanSection = document.getElementById("loanSection");
    const paymentSection = document.getElementById("paymentSection");

    if (loanOption === "yes") {
        loanSection.style.display = "block";
        paymentSection.style.display = "none";
    } else {
        loanSection.style.display = "none";
        paymentSection.style.display = "block";
    }
}

function toggleCustomPlanField() {
    const chosenPlan = document.getElementById("chosenPlan").value;
    const customPlanSection = document.getElementById("customPlanSection");

    customPlanSection.style.display = chosenPlan === "custom" ? "block" : "none";
}

function showSuccessMessage(event) {
    event.preventDefault();
    alert("Your request has been successfully submitted!");
    document.getElementById("serviceRequestForm").reset();
    document.getElementById("installationFields").style.display = "none";
}
