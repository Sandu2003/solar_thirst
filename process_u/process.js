// JavaScript for AJAX submission

// Add Step Form
document.getElementById("add-step-form").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch("process_flow.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Optionally, reload or refresh the page to show the updated steps
    })
    .catch(error => console.error("Error:", error));
});

// Save Changes for each process step
document.querySelectorAll(".save-btn").forEach(button => {
    button.addEventListener("click", function() {
        const stepId = this.dataset.stepId;
        const description = this.previousElementSibling.querySelector(".edit-textarea").value;
        
        fetch("process_flow.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `step_id=${stepId}&description=${encodeURIComponent(description)}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            // Optionally, refresh the process flow view to show updated data
        })
        .catch(error => console.error("Error:", error));
    });
});
