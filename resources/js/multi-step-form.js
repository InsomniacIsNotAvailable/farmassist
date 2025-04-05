document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector(".multi-step-form");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");
    const fieldsets = form.querySelectorAll(".form-step");
    let currentStep = 0;

    // Show the current step
    function showStep(step) {
        fieldsets.forEach((fieldset, index) => {
            fieldset.classList.toggle("active", index === step);
        });
    }

    // Validate current step
    function validateStep(step) {
        const inputs = fieldsets[step].querySelectorAll("input");
        for (const input of inputs) {
            if (!input.checkValidity()) {
                alert(input.validationMessage); // Show the validation message
                input.focus(); // Focus on the invalid input
                return false; // Prevent moving to the next step
            }
        }
        return true; // Allow moving to the next step
    }

    // Next button functionality
    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep); // Show the next step
            }
        });
    });

    // Previous button functionality
    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            currentStep--;
            showStep(currentStep); // Show the previous step
        });
    });

    // Final validation on form submission
    form.addEventListener("submit", (e) => {
        const password = document.getElementById("signup_rawpassword").value;
        const confirmPassword = document.getElementById("signup_confirmpassword").value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Passwords do not match.");
        }
    });

    // Show the first step on page load
    showStep(currentStep);
});