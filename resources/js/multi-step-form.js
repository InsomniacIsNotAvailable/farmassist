document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.form-step');
    const nextBtns = document.querySelectorAll('.next-btn');
    const prevBtns = document.querySelectorAll('.prev-btn');
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((formStep, index) => {
            formStep.classList.toggle('active', index === step);
        });
    }

    nextBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            currentStep++;
            showStep(currentStep);
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });
    });

    showStep(currentStep); // Initialize the first step
});