<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

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