// =====================================================
// THEME TOGGLE (dark / light mode)
// =====================================================
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

// Apply saved theme on load
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'light') {
    body.classList.add('light-mode');
    themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
} else {
    themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
}

// Toggle theme on click
themeToggle.addEventListener('click', () => {
    body.classList.toggle('light-mode');

    const isLight = body.classList.contains('light-mode');
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
    themeToggle.innerHTML = isLight
        ? '<i class="fas fa-sun"></i>'
        : '<i class="fas fa-moon"></i>';
});

// =====================================================
// MOBILE NAVIGATION
// =====================================================
const menuBtn = document.getElementById("menuBtn");
const navLinks = document.getElementById("navLinks");

menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("show");

    const isOpen = navLinks.classList.contains("show");

    menuBtn.setAttribute("aria-expanded", isOpen);
    menuBtn.innerHTML = isOpen
        ? '<i class="fas fa-times"></i>'
        : '<i class="fas fa-bars"></i>';
});

// Close menu after clicking a navigation link
document.querySelectorAll(".nav-links a").forEach(link => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("show");
        menuBtn.setAttribute("aria-expanded", "false");
        menuBtn.innerHTML = '<i class="fas fa-bars"></i>';
    });
});

// =====================================================
// ACTIVE NAVIGATION LINK
// =====================================================
const sections = document.querySelectorAll("section");
const navItems = document.querySelectorAll(".nav-links a:not([href='#'])");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        const sectionHeight = section.offsetHeight;

        if (
            window.scrollY >= sectionTop &&
            window.scrollY < sectionTop + sectionHeight
        ) {
            current = section.getAttribute("id");
        }
    });

    navItems.forEach(link => {
        link.classList.remove("active");

        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});

// =====================================================
// AUTOMATIC COPYRIGHT YEAR
// =====================================================
document.getElementById("year").textContent = new Date().getFullYear();

// =====================================================
// SIMPLE TYPING EFFECT
// =====================================================
const typingText = document.querySelector(".typing-text");

const words = [
    "BSIT Student",
    "Web Developer",
    "Future IT Professional"
];

let wordIndex = 0;
let charIndex = 0;
let deleting = false;

function typeEffect() {
    const currentWord = words[wordIndex];

    if (deleting) {
        charIndex--;
    } else {
        charIndex++;
    }

    typingText.textContent = currentWord.substring(0, charIndex);

    let speed = deleting ? 60 : 100;

    if (!deleting && charIndex === currentWord.length) {
        deleting = true;
        speed = 1500;
    } else if (deleting && charIndex === 0) {
        deleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        speed = 500;
    }

    setTimeout(typeEffect, speed);
}

typeEffect();

// =====================================================
// ABOUT ME MODAL
// =====================================================
(function () {
    function initAboutModal() {
        const modal = document.getElementById("aboutModal");
        const content = document.getElementById("aboutContent");
        if (!modal || !content) return;


        // Inject the modal styles from JS so the popup works even if
        // the browser/WordPress is still serving an old cached css.css
        if (!document.getElementById("aboutModalStyles")) {
            const st = document.createElement("style");
            st.id = "aboutModalStyles";
            st.textContent = `
.about-modal{position:fixed;top:0;left:0;right:0;bottom:0;z-index:99999;background:rgba(0,0,0,.7);backdrop-filter:blur(6px);display:flex;align-items:center;justify-content:center;padding:20px;opacity:0;visibility:hidden;transition:opacity .3s ease,visibility .3s ease}
.about-modal.open{opacity:1;visibility:visible}
.about-modal-box{position:relative;width:100%;max-width:520px;max-height:90vh;overflow-y:auto;background:var(--card,#151523);color:var(--body-text,#fff);border:1px solid var(--primary,#a855f7);border-radius:18px;padding:32px;box-shadow:0 0 40px var(--shadow-color,rgba(168,85,247,.15));transform:translateY(30px) scale(.95);transition:transform .3s ease}
.about-modal.open .about-modal-box{transform:translateY(0) scale(1)}
.about-close{position:absolute;top:14px;right:18px;background:none;border:none;color:var(--gray,#a1a1aa);font-size:30px;line-height:1;cursor:pointer}
.about-close:hover{color:var(--primary,#a855f7)}
.about-header{display:flex;align-items:center;gap:18px;margin-bottom:20px}
.about-header img{width:90px;height:90px;object-fit:cover;border-radius:50%;border:3px solid var(--primary,#a855f7)}
.about-header h3{font-size:19px;color:var(--body-text,#fff);margin-bottom:6px}
.about-role{color:var(--secondary,#06b6d4);font-size:12px;font-weight:600}
.about-modal-box h4{font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--primary,#a855f7);margin:18px 0 8px}
.about-modal-box p{font-size:13px;line-height:1.9;color:var(--text-on-card,#d4d4d8)}
.about-tags{display:flex;flex-wrap:wrap;gap:8px}
.about-tags span{padding:6px 14px;border:1px solid var(--primary,#a855f7);border-radius:20px;font-size:11px;color:var(--body-text,#fff)}
@media(max-width:500px){.about-modal-box{padding:24px 20px}.about-header{flex-direction:column;text-align:center}}
`;
            document.head.appendChild(st);
        }

        // Move the modal to <body> so no card/transform can affect it
        document.body.appendChild(modal);

        function openAbout(index) {
            const tpl = document.getElementById("about-" + index);
            if (!tpl) return;

            content.innerHTML = "";
            content.appendChild(tpl.content.cloneNode(true));

            modal.classList.add("open");
            modal.setAttribute("aria-hidden", "false");
            document.body.style.overflow = "hidden";
        }

        function closeAbout() {
            modal.classList.remove("open");
            modal.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
        }

        document.addEventListener("click", function (e) {
            const btn = e.target.closest(".about-btn");
            if (btn) {
                e.preventDefault();
                openAbout(btn.getAttribute("data-about"));
                return;
            }
            if (e.target === modal || e.target.closest("#aboutClose")) {
                closeAbout();
            }
        });

        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") closeAbout();
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initAboutModal);
    } else {
        initAboutModal();
    }
})();

// =====================================================
// SKILLS TABS
// =====================================================
document.addEventListener("click", function (e) {
    const tab = e.target.closest(".skills-tab");
    if (!tab) return;

    const id = tab.getAttribute("data-skill-tab");

    document.querySelectorAll(".skills-tab").forEach(function (t) {
        const on = t === tab;
        t.classList.toggle("active", on);
        t.setAttribute("aria-selected", on ? "true" : "false");
    });

    document.querySelectorAll(".skills-panel").forEach(function (p) {
        p.classList.toggle("active", p.id === "skills-panel-" + id);
    });
});