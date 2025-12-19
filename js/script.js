let addStudentPanel = document.querySelector(".add-student-panel");
let addStudentBtn = document.querySelector(".add-student-btn");

let addAddPanel = document.querySelector(".add-btn");
let cancelAddPanel = document.querySelector(".cancel-btn");

addStudentBtn.addEventListener("click", () => {
    showAddStudentPanel();
});

addAddPanel.addEventListener("click", () => {
    // hideAddStudentPanel()
});

cancelAddPanel.addEventListener("click", () => {
    hideAddStudentPanel()
});






function showAddStudentPanel() {
    addStudentPanel.style.display = "block";
}

function hideAddStudentPanel() {
    addStudentPanel.style.display = "none";
}