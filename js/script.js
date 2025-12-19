let addStudentPanel = document.querySelector(".add-student-panel");
let addStudentBtn = document.querySelector(".add-student-btn");
let addAddPanel = document.querySelector(".add-btn");
let cancelAddPanel = document.querySelector(".cancel-btn");
let studentForm = document.getElementById("studentForm");

addStudentBtn.addEventListener("click", () => {
    showAddStudentPanel();
});

addAddPanel.addEventListener("click", (e) => {
    e.preventDefault();
    addStudent();
});

cancelAddPanel.addEventListener("click", () => {
    hideAddStudentPanel();
    studentForm.reset();
});

function showAddStudentPanel() {
    addStudentPanel.style.display = "block";
}

function hideAddStudentPanel() {
    addStudentPanel.style.display = "none";
}

function addStudent() {
    const formData = new FormData(studentForm);
    
    fetch('php/add_student.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Student added successfully!');
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });
}

function deleteStudent(id) {
    if (confirm('Are you sure you want to delete this student?')) {
        const formData = new FormData();
        formData.append('id', id);
        
        fetch('php/delete_student.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Student deleted successfully!');
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Error: ' + error);
        });
    }
}

function editStudent(id) {
    showAddStudentPanel();
}