document.getElementById("add-step-form").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch("add_step.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data))
    .catch(error => console.error("Error:", error));
});

document.querySelectorAll(".save-btn").forEach(button => {
    button.addEventListener("click", function() {
        const stepId = this.dataset.stepId;
        const description = this.previousElementSibling.querySelector(".edit-textarea").value;
        
        fetch("update_step.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `step_id=${stepId}&description=${encodeURIComponent(description)}`
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error("Error:", error));
    });
});
