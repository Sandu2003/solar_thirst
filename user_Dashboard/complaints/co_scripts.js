function submitComplaint(event) {
    event.preventDefault(); // Prevents form submission to allow for custom handling

    // Get form data
    const complaintType = document.getElementById("complaintType").value;
    const complaintDescription = document.getElementById("complaintDescription").value;
    const complaintAttachment = document.getElementById("complaintAttachment").files[0];

    // Simulate a success message
    const successMessageDiv = document.getElementById("successMessage");

    // Display the success message
    successMessageDiv.style.display = "block";

    // Optionally, you can log or process the complaint here
    console.log("Complaint Type:", complaintType);
    console.log("Complaint Description:", complaintDescription);
    if (complaintAttachment) {
        console.log("Complaint Attachment:", complaintAttachment.name);
    }

    // Reset the form
    document.getElementById("complaintForm").reset();
}
