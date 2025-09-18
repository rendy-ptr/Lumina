// Mobile Menu Toggle
function toggleMobileMenu() {
    const menu = document.getElementById("mobileMenu");
    const isVisible = !menu.classList.contains("invisible");

    if (isVisible) {
        menu.classList.add("opacity-0", "invisible", "-translate-y-4");
    } else {
        menu.classList.remove("opacity-0", "invisible", "-translate-y-4");
    }
}

// Scroll to Top
const scrollToTopBtn = document.getElementById("scrollToTop");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.remove("opacity-0", "invisible");
    } else {
        scrollToTopBtn.classList.add("opacity-0", "invisible");
    }
});

scrollToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// Close mobile menu when clicking outside
document.addEventListener("click", (e) => {
    const menu = document.getElementById("mobileMenu");
    const button = e.target.closest('button[onclick="toggleMobileMenu()"]');
    const menuContent = e.target.closest("#mobileMenu");

    if (!button && !menuContent && !menu.classList.contains("invisible")) {
        menu.classList.add("opacity-0", "invisible", "-translate-y-4");
    }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
            });
        }
    });
});

// Add loading states to buttons
document.querySelectorAll("button").forEach((button) => {
    button.addEventListener("click", function () {
        const originalText = this.textContent;
        if (!this.disabled && !this.classList.contains("no-loading")) {
            this.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current inline" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Loading...
            `;
            this.disabled = true;

            setTimeout(() => {
                this.textContent = originalText;
                this.disabled = false;
            }, 2000);
        }
    });
});

// Parallax effect for hero section
window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector(".hero-gradient");
    const speed = 0.5;

    if (parallax) {
        parallax.style.transform = `translateY(${scrolled * speed}px)`;
    }
});

// Initialize animations on page load
window.addEventListener("load", () => {
    document.body.classList.add("loaded");
});

// Add intersection observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("animate-slide-up");
        }
    });
}, observerOptions);

// Observe all cards
document.querySelectorAll(".card").forEach((card) => {
    observer.observe(card);
});
