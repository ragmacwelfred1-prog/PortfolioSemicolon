<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

    <!-- DARK MODE BACKGROUND (video + aurora fallback) -->
    <div class="bg-media" aria-hidden="true">
        <div class="bg-aurora"><span></span><span></span><span></span></div>
        <video class="bg-video" id="bgVideo" autoplay muted loop playsinline preload="auto">
            <!-- 1) your own file (best): assets/src/bg-dark.mp4 -->
            <source src="<?php echo get_template_directory_uri(); ?>/assets/src/bg-dark.mp4" type="video/mp4">
            <!-- 2) backup: Pexels link, used only if the file above is missing -->
            <source src="https://videos.pexels.com/video-files/35689742/15125884_1920_1080_24fps.mp4" type="video/mp4">
        </video>
        <div class="bg-overlay"></div>
    </div>

    <!-- NAVBAR -->
    <header>
        <nav class="navbar">
            <a href="#home" class="logo">Semicolon<span>Portfolio.</span></a>

            <ul class="nav-links" id="navLinks">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#skill">Skill</a></li>
                <li><a href="#project">Project</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <button class="theme-toggle" id="themeToggle" aria-label="Switch between dark and light mode">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>
            </ul>

            <button class="menu-btn" id="menuBtn" aria-label="Toggle navigation" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>