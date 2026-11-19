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
// NAVBAR: SHRINK + SHADOW ON SCROLL
// =====================================================
const siteHeader = document.querySelector("header");

function toggleHeaderState() {
    siteHeader.classList.toggle("scrolled", window.scrollY > 30);
}

window.addEventListener("scroll", toggleHeaderState);
toggleHeaderState();

// =====================================================
// AUTOMATIC COPYRIGHT YEAR
// =====================================================
document.getElementById("year").textContent = new Date().getFullYear();

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

// =====================================================
// SECTION ANIMATIONS (PowerPoint style)
// =====================================================
(function () {
    // [selector, animation, stagger step (s), start delay (s)]
    // animations: up, drop, left, right, zoom, flip, wipe, bounce
    const targets = [
        // HOME
        [".home .social-links",  "bounce", 0,    0.85],
        [".home .btn",           "bounce", 0,    1.0],
        [".home-image",          "zoom",   0,    0.3],


        // TEAM
        [".team-card",           "flip",   0.15, 0.25],

        // SKILL
        [".skills-nav",          "left",   0,    0.15],
        [".skills-panels",       "right",  0,    0.3],

        // PROJECT
        [".project-card",        "bounce", 0.2,  0.15],

        // CONTACT
        [".contact-team-list",       "left",  0, 0.15],
        [".team-list-item",          "up",    0.12, 0.4],
        [".contact-form-container",  "right", 0, 0.3],

        // FOOTER
        ["footer",               "up",     0,    0]
    ];

    const items = [];

    targets.forEach(function (t) {
        const counts = new Map(); // stagger per parent, so each group starts at 0
        document.querySelectorAll(t[0]).forEach(function (el) {
            const n = counts.get(el.parentNode) || 0;
            counts.set(el.parentNode, n + 1);

            el.classList.add("reveal");
            el.setAttribute("data-anim", t[1]);
            el.style.setProperty("--d", (t[3] + n * t[2]).toFixed(2) + "s");
            items.push(el);
        });
    });

    if (!("IntersectionObserver" in window)) {
        items.forEach(function (el) { el.classList.add("in-view"); });
        return;
    }

    // IMPORTANT: while an element is animating it is moved (translate/rotate),
    // and the observer sees that moved position. That made elements near the
    // bottom of the screen switch on/off forever (the blinking). So an element
    // is "busy" while its animation plays and the observer is ignored for it.
    function play(el) {
        el._busy = true;
        el.classList.add("in-view");

        const delay = parseFloat(el.style.getPropertyValue("--d")) || 0;
        setTimeout(function () {
            el._busy = false;
            // if it was scrolled away during the animation, reset it now
            const r = el.getBoundingClientRect();
            if (r.bottom <= 0 || r.top >= window.innerHeight) {
                el.classList.remove("in-view");
            }
        }, (delay + 1.4) * 1000);
    }

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            const el = entry.target;
            if (el._busy) return;

            if (entry.intersectionRatio >= 0.1) {
                if (!el.classList.contains("in-view")) play(el);
            } else if (!entry.isIntersecting) {
                // fully off screen -> reset, so it animates again next time
                el.classList.remove("in-view");
            }
        });
    }, { threshold: [0, 0.1] });

    items.forEach(function (el) { observer.observe(el); });
})();

// =====================================================
// DARK MODE BACKGROUND VIDEO (plays only in dark mode)
// =====================================================
(function () {
    const media = document.querySelector(".bg-media");
    const video = document.getElementById("bgVideo");
    if (!media || !video) return;

    function syncVideo() {
        const dark = !document.body.classList.contains("light-mode");
        if (dark && media.classList.contains("has-video")) {
            const p = video.play();
            if (p && p.catch) p.catch(function () {});
        } else {
            video.pause();
        }
    }

    // video file found and loaded
    function onReady() {
        if (media.classList.contains("has-video")) return;
        media.classList.add("has-video");
        console.log("Background video loaded: " + (video.currentSrc || ""));
        syncVideo();
    }
    video.addEventListener("loadeddata", onReady);
    video.addEventListener("canplay", onReady);
    if (video.readyState >= 2) onReady();   // already loaded before this script ran

    // if the browser blocked autoplay, start it on the first scroll / click / tap
    ["click", "scroll", "touchstart", "keydown"].forEach(function (evt) {
        window.addEventListener(evt, function () { syncVideo(); }, { once: true, passive: true });
    });

    // every source failed -> hide the player, the aurora glow stays
    // (the error event fires on the <source> elements, so only react to the last one)
    const sources = video.querySelectorAll("source");
    const lastSource = sources[sources.length - 1];
    video.addEventListener("error", function (e) {
        if (e.target === lastSource || e.target === video) {
            video.style.display = "none";
            media.classList.remove("has-video");
            console.warn("Background video not found: " + (lastSource ? lastSource.src : ""));
        }
    }, true);

    // switch dark/light
    const toggle = document.getElementById("themeToggle");
    if (toggle) toggle.addEventListener("click", syncVideo);

    // ---- DEBUG PANEL: open the site with ?debugvideo=1 at the end of the address ----
    if (location.search.indexOf("debugvideo") !== -1) {
        const box = document.createElement("div");
        box.style.cssText = "position:fixed;left:10px;bottom:10px;z-index:999999;max-width:92vw;" +
            "background:#000;color:#0f0;font:12px/1.5 monospace;padding:10px 12px;border:1px solid #0f0;" +
            "border-radius:8px;white-space:pre-wrap;pointer-events:none";
        document.body.appendChild(box);

        function report(evt) {
            const err = video.error ? ("code " + video.error.code + " " + (video.error.message || "")) : "none";
            box.textContent =
                "VIDEO DEBUG (last event: " + evt + ")\n" +
                "file: " + (video.currentSrc || "(no source chosen)") + "\n" +
                "readyState: " + video.readyState + " (4 = ready)   networkState: " + video.networkState + "\n" +
                "paused: " + video.paused + "   time: " + video.currentTime.toFixed(1) + "s\n" +
                "size: " + video.videoWidth + "x" + video.videoHeight + "\n" +
                "error: " + err + "\n" +
                "dark mode: " + !document.body.classList.contains("light-mode") + "\n" +
                "bg layer display: " + getComputedStyle(media).display + "\n" +
                "video display: " + getComputedStyle(video).display + "\n" +
                "reduce-motion ON: " + matchMedia("(prefers-reduced-motion: reduce)").matches;
        }

        ["loadstart", "loadedmetadata", "loadeddata", "canplay", "playing", "pause", "stalled", "suspend", "waiting"]
            .forEach(function (e) { video.addEventListener(e, function () { report(e); }); });
        video.addEventListener("error", function () { report("error"); }, true);
        setInterval(function () { report("timer"); }, 1000);
        report("start");
    }
})();