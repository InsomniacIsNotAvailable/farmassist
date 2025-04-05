document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    let lastScrollY = window.scrollY;
    let scrollThreshold = 10; // Minimum scroll distance before hiding the header
    let isScrollingDown = false;

    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;

        if (Math.abs(currentScrollY - lastScrollY) > scrollThreshold) {
            if (currentScrollY > lastScrollY && currentScrollY > 70) {
                // Scrolling down and past the header height
                header.style.transform = 'translateY(-100%)'; // Hide the header
                isScrollingDown = true;
            } else if (currentScrollY < lastScrollY && isScrollingDown) {
                // Scrolling up
                header.style.transform = 'translateY(0)'; // Show the header
                isScrollingDown = false;
            }
            lastScrollY = currentScrollY; // Update the last scroll position
        }
    });
});