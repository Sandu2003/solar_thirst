// Toggle textarea for editing description
document.querySelectorAll('.process-step').forEach(step => {
    const editBtn = step.querySelector('.save-btn');
    const textarea = step.querySelector('.edit-textarea');
    const descriptionText = step.querySelector('.description-text');

    // Enable editing when the user clicks the description
    descriptionText.addEventListener('click', function() {
        textarea.style.display = 'block';
        descriptionText.style.display = 'none';
        editBtn.style.display = 'inline-block';
        textarea.value = descriptionText.textContent;
    });

    // Save changes when the save button is clicked
    editBtn.addEventListener('click', function() {
        descriptionText.textContent = textarea.value;
        textarea.style.display = 'none';
        descriptionText.style.display = 'block';
        editBtn.style.display = 'none';
    });
});

// Handle adding a new process step
document.getElementById('add-step-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('new-step-title').value;
    const description = document.getElementById('new-step-description').value;

    const newStepHTML = `
        <div class="process-step">
            <h4>${title}</h4>
            <div class="editable-description">
                <p class="description-text">${description}</p>
                <textarea class="edit-textarea" placeholder="Edit description here..."></textarea>
            </div>
            <button class="save-btn">Save Changes</button>
        </div>
    `;

    // Append the new step to the process flow
    document.getElementById('process-flow').insertAdjacentHTML('beforeend', newStepHTML);

    // Reset the form
    document.getElementById('add-step-form').reset();
});
