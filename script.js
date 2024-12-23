document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("admissionForm");
    const successMessage = document.getElementById("successMessage");

    // Function to validate file upload size
    function validateFileSize(fileInput) {
        const maxFileSize = 2 * 1024 * 1024; // 2 MB
        if (fileInput.files[0].size > maxFileSize) {
            alert("Profile picture must be less than 2 MB.");
            fileInput.value = ""; // Clear the input
            return false;
        }
        return true;
    }

    // Add an event listener to the file input field
    const profilePictureInput = document.getElementById("profilePicture");
    profilePictureInput.addEventListener("change", () => {
        validateFileSize(profilePictureInput);
    });

    // Event listener for form submission
    form.addEventListener("submit", (e) => {
        // Basic client-side validation
        const fullName = document.getElementById("fullName").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const course = document.getElementById("course").value;

        if (!fullName || !email || !phone || !course) {
            alert("Please fill out all required fields.");
            e.preventDefault(); // Prevent submission
            return;
        }

        if (!profilePictureInput.value) {
            alert("Please upload a profile picture.");
            e.preventDefault(); // Prevent submission
            return;
        }

        // Display a success message and allow submission
        successMessage.textContent = "Submitting your application...";
        successMessage.style.color = "green";
    });
});
