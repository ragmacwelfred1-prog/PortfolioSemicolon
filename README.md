# Semicolon — WordPress Professional Portfolio

## 🌐 Live Website

*Visit our deployed WordPress Professional Portfolio:*

[https://brown-swallow-895329.hostingersite.com](https://brown-swallow-895329.hostingersite.com)

## 📌 Project Overview

The Semicolon WordPress Professional Portfolio is a team-developed website created by Team Semicolon, a group of Bachelor of Science in Information Technology (BSIT) students.

The portfolio showcases the team's members, skills, projects, and contact information through a customized WordPress website.

## 🎯 Project Objectives

- Develop a professional and responsive team portfolio website.
- Showcase the skills, projects, and roles of the team members.
- Apply WordPress customization and web development skills.
- Provide a working contact form for inquiries.
- Deploy the website using a web hosting platform.

## 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| WordPress | Content management system |
| PHP | WordPress theme development, team data, and contact form handling |
| HTML5 | Website structure and content |
| CSS3 | Website styling, dark/light themes, layout, animations, and responsive design |
| JavaScript | Interactive website functionality and user experience |
| Font Awesome | Icons used across the website |
| Google Fonts (Poppins) | Website typography |
| Hostinger | Website hosting and deployment |

## 📂 Project Structure

```text
semicolon-portfolio/
├── README.md
├── style.css
├── functions.php
├── header.php
├── footer.php
├── index.php
├── front-page.php
└── assets/
    ├── css/
    │   └── css.css
    ├── js/
    │   └── js.js
    └── src/
        ├── semicolonn.png
        ├── wel.jpg
        ├── elykyuti.jpg
        ├── baby.jpg
        ├── bro.jpg
        ├── system.jpg
        ├── portfolio.png
        ├── gmail.png
        ├── github.png
        ├── messenger.png
        ├── ttk.png
        └── bg-dark.mp4
```

## ⚙️ Theme Files and Functions

| File | Description |
|---|---|
| style.css | Contains the WordPress theme information (name, author, version). |
| functions.php | Loads the CSS, JavaScript, Google Fonts, and Font Awesome; enables the title tag; and handles the contact form submission. |
| header.php | Contains the document head, dark-mode background video, and the navigation bar. |
| front-page.php | Contains the Home, Team, Skills, Projects, and Contact sections of the website. |
| index.php | Fallback template for displaying regular WordPress content. |
| footer.php | Contains the footer and closes the page. |
| assets/css/css.css | Defines the visual design, dark/light themes, layout, animations, and responsive styling. |
| assets/js/js.js | Handles interactive functionality such as the theme toggle, mobile menu, modal, skills tabs, and scroll animations. |
| assets/src/ | Stores the team logo, member photos, project images, contact icons, and background video. |

## 💻 JavaScript Functionality

The custom JavaScript file enhances the user experience through the following features:

- *Theme Toggle:* Switches between dark and light mode and remembers the user's choice.
- *Mobile Navigation:* Opens and closes the navigation menu on smaller screens.
- *Active Navigation Highlighting:* Highlights the navigation link corresponding to the section currently in view.
- *Scroll Effects:* Shrinks the header and adds a shadow when the user scrolls down.
- *About Me Modal:* Opens a pop-up with each member's details, skills, goal, and fun fact.
- *Skills Tabs:* Lets visitors switch between each member's expert skills.
- *Scroll Animations:* Animates sections into view (fly, flip, zoom, bounce) as the user scrolls.
- *Background Video:* Plays a looping background video in dark mode with an animated fallback.
- *Automatic Copyright Year:* Updates the footer year automatically.

## ✉️ Contact Form

The General Inquiry form is processed by `semicolon_handle_contact()` in `functions.php`:

- Inputs are sanitized using WordPress functions.
- A hidden honeypot field blocks simple spam bots.
- Messages are sent to the site's admin email using `wp_mail()`.
- Visitors are redirected back to the contact section with a success or error message.

## 🚀 Development Progress

- [x] Create custom WordPress theme.
- [x] Develop initial theme structure and styling.
- [x] Implement custom JavaScript functionality.
- [x] Develop portfolio content and team sections.
- [x] Add dark/light mode and animations.
- [x] Create contact form with email handling.
- [x] Create project documentation using README.md.
- [x] Deploy website to Hostinger.
- [ ] Continue website improvements and customization.
- [ ] Perform final responsiveness and functionality testing.
- [ ] Test website across different browsers.

## 👥 Team Members

| Member | Role |
|---|---|
| Welfred Ragmac | Programmer |
| Elylordi Adaro | System Analyst |
| Ashley Krizzhia Rhaye Rhoda | Project Manager |
| Joshua Dane | Technical Writer |

## 🔗 Repository

*GitHub Repository:*

[https://github.com/your-username/semicolon-portfolio](https://github.com/your-username/semicolon-portfolio)

## 🎓 Academic Project

*Bachelor of Science in Information Technology (BSIT)*

*Subject:* To be updated

*Project:* WordPress Professional Portfolio

*Developed by:* Team Semicolon.