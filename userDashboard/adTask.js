// Get elements from the DOM
const elements = {
    addTaskBtn: document.getElementById("addTaskBtn"),  // Button to open the 'Add Task' modal
    taskModal: document.getElementById("taskModal"),    // The modal element for adding tasks
    modalContent: document.querySelector(".modal-content"),  // The content inside the modal (for animation)
    closeModal: document.querySelector(".close"),       // The button to close the 'Add Task' modal
    saveTaskBtn: document.getElementById("saveTaskBtn"), // Button to save the new task
    taskInput: document.getElementById("taskInput"),     // Input field to add a new task name
    tasksList: document.getElementById("tasksList"),     // The list element where tasks are displayed
    taskModalEdit: document.getElementById("taskModalEdit"),  // The modal element for editing tasks
    editTaskInput: document.getElementById("editTaskInput"),  // Input field to edit an existing task name
    saveEditTaskBtn: document.getElementById("saveEditTaskBtn"),  // Button to save the edited task
    closeEditModal: document.querySelector(".close-edit"),  // Button to close the edit modal
};

// Variable to store the ID of the task being edited
let currentTaskId = null;

// Function to toggle modal visibility (open or close modals)
const toggleModal = (modal, display) => {
    modal.style.display = display;  // Set display to "flex" (open) or "none" (close)
    elements.modalContent.style.animation = display === "flex" ? "fadeIn 0.3s ease-in-out" : "fadeOut 0.3s ease-in-out";  // Add fade animations
    if (display !== "flex") setTimeout(() => modal.style.display = display, 300);  // Ensure modal closes after the fade-out animation
};

// Event listeners to handle modal visibility for adding and editing tasks
elements.addTaskBtn.addEventListener("click", () => toggleModal(elements.taskModal, "flex"));  // Open 'Add Task' modal
elements.closeModal.addEventListener("click", () => toggleModal(elements.taskModal, "none"));  // Close 'Add Task' modal
elements.closeEditModal.addEventListener("click", () => toggleModal(elements.taskModalEdit, "none"));  // Close 'Edit Task' modal

// Function to add a new task when 'Save Task' is clicked
elements.saveTaskBtn.addEventListener("click", () => {
    const taskName = elements.taskInput.value.trim();  // Get the task name from the input
    if (taskName) {
        const formData = new FormData();  // Create a FormData object for the POST request
        formData.append('action', 'add');  // Add 'action' as 'add' (used by backend)
        formData.append('task_name', taskName);  // Add the task name to the form data

        // Send the data to the server via POST request
        fetch('task.php', { method: 'POST', body: formData })
            .then(response => response.text())  // Process the response as text
            .then(data => {
                alert(data);  // Show a message (response from server)
                location.reload();  // Refresh the page to show the updated tasks
            });

        elements.taskInput.value = "";  // Clear the input field
        toggleModal(elements.taskModal, "none");  // Close the 'Add Task' modal
    }
});

// Function to open the 'Edit Task' modal with the current task's information
const openEditModal = (taskId, taskName) => {
    currentTaskId = taskId;  // Store the ID of the task being edited
    elements.editTaskInput.value = taskName;  // Set the input value to the task name
    toggleModal(elements.taskModalEdit, "flex");  // Open the 'Edit Task' modal
};

// Function to save the edited task when 'Save Edit Task' is clicked
elements.saveEditTaskBtn.addEventListener("click", () => {
    const updatedTaskName = elements.editTaskInput.value.trim();  // Get the updated task name
    if (updatedTaskName) {
        const formData = new FormData();  // Create a FormData object for the POST request
        formData.append('action', 'update');  // Add 'action' as 'update' (used by backend)
        formData.append('task_id', currentTaskId);  // Add the task ID to the form data
        formData.append('task_name', updatedTaskName);  // Add the updated task name to the form data

        // Send the data to the server via POST request
        fetch('task.php', { method: 'POST', body: formData })
            .then(response => response.text())  // Process the response as text
            .then(data => {
                alert(data);  // Show a message (response from server)
                location.reload();  // Refresh the page to show the updated tasks
            });

        toggleModal(elements.taskModalEdit, "none");  // Close the 'Edit Task' modal
    }
});

// Function to delete a task
const deleteTask = (taskId) => {
    const formData = new FormData();  // Create a FormData object for the POST request
    formData.append('action', 'delete');  // Add 'action' as 'delete' (used by backend)
    formData.append('task_id', taskId);  // Add the task ID to the form data

    // Send the data to the server via POST request
    fetch('task.php', { method: 'POST', body: formData })
        .then(response => response.text())  // Process the response as text
        .then(data => {
            alert(data);  // Show a message (response from server)
            location.reload();  // Refresh the page to show the updated tasks
        });
};

// Function to mark a task as complete
const completeTask = (taskId, taskDiv) => {
    const formData = new FormData();  // Create a FormData object for the POST request
    formData.append('action', 'complete');  // Add 'action' as 'complete' (used by backend)
    formData.append('task_id', taskId);  // Add the task ID to the form data

    // Send the data to the server via POST request
    fetch('task.php', { method: 'POST', body: formData })
        .then(response => response.text())  // Process the response as text
        .then(data => {
            alert(data);  // Show a message (response from server)
            taskDiv.remove();  // Remove the task from the DOM (it was completed)
        });
};

// Function to dynamically add a task to the tasks list
const addTaskToSchedule = (taskName, taskId) => {
    const taskDiv = document.createElement("div");  // Create a new div for the task
    taskDiv.classList.add("task");  // Add a class to the task div

    const label = document.createElement('label');  // Create a label to display the task name
    label.textContent = taskName;  // Set the label text to the task name

    // Create buttons for editing, deleting, and completing tasks
    const deleteBtn = createButton("Delete", () => deleteTask(taskId));
    const editBtn = createButton("Edit", () => openEditModal(taskId, taskName));
    const completeBtn = createButton("Complete", () => completeTask(taskId, taskDiv));

    // Append the label and buttons to the task div
    taskDiv.append(label, editBtn, completeBtn, deleteBtn);

    // Add the task div to the tasks list in the DOM
    elements.tasksList.appendChild(taskDiv);
};
