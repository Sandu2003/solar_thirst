document.getElementById("add-step-form").addEventListener("submit", function(e) {
    e.preventDefault();

    // Get step title and description from form inputs
    const stepTitle = document.getElementById("new-step-title").value;
    const description = document.getElementById("new-step-description").value;

    // Display the new step immediately on the page
    addStepToPage(stepTitle, description);

    // Clear the form inputs
    document.getElementById("new-step-title").value = "";
    document.getElementById("new-step-description").value = "";
});

// Function to dynamically add a new step to the page
function addStepToPage(stepTitle, description) {
    const stepDiv = document.createElement("div");
    stepDiv.classList.add("step");

    const titleElement = document.createElement("h3");
    titleElement.textContent = stepTitle;

    const descriptionElement = document.createElement("p");
    descriptionElement.textContent = description;

    stepDiv.appendChild(titleElement);
    stepDiv.appendChild(descriptionElement);

    // Append the new step to the process flow container
    document.getElementById("process-flow").appendChild(stepDiv);
}
