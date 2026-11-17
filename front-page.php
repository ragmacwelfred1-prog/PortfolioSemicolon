<?php get_header(); ?>
<?php $img = get_template_directory_uri() . '/assets/src/'; ?>

    <!-- HOME SECTION -->
    <section class="home" id="home">
        <div class="home-content">
            <p class="greeting">HELLO, WELCOME TO OUR TEAM</p>

            <h1> We are <span>Team Semicolon</span></h1>

            <h2>We're <span class="typing-text">BSIT Student</span></h2>

            <p class="description">
                We are a passionate group of Information Technology students who enjoy
                creating websites, exploring new technologies, and developing
                creative solutions to real-world problems. Together, we turn ideas into reality.
            </p>

            <div class="social-links">
                <a href="https://facebook.com/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://github.com/" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <a href="#project" class="btn">Explore Our Work <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="home-image">
            <div class="image-circle">
                <img src="<?php echo $img; ?>semicolonn.png" alt="Team Logo">
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <?php
    // ===== I-EDIT DITO ANG DETAILS NG BAWAT MEMBER =====
    $team = [
        [
            'photo'   => 'wel.jpg',
            'name'    => 'Welfred Ragmac',
            'role'    => 'Programmer',
            'icon'    => 'fas fa-code',
            'desc'    => 'Responsible for coding, developing, and maintaining the system.',
            'about'   => "I'm the one who turns our ideas into working code. I enjoy building clean, responsive web pages and connecting them to databases with PHP and MySQL. Debugging late at night is my specialty, and I'm happiest when a stubborn bug finally gets fixed.",
            'skills'  => ['HTML5', 'CSS3', 'JavaScript', 'PHP', 'MySQL'],
            'goal'    => 'To become a full-stack developer building systems that help local businesses.',
            'fun'     => 'Can drink three cups of coffee while fixing a single bug.',
        ],
        [
            'photo'   => 'elykyuti.jpg',
            'name'    => 'Elylordi Adaro',
            'role'    => 'System Analyst',
            'icon'    => 'fas fa-chart-line',
            'desc'    => 'Responsible for analyzing system requirements and identifying solutions.',
            'about'   => "I study how a system should work before anyone writes a single line of code. I gather requirements, draw flowcharts and ERDs, and make sure our solution actually solves the user's problem. I like asking \"why?\" until everything makes sense.",
            'skills'  => ['Requirements Gathering', 'ERD & DFD', 'UML Diagrams', 'MySQL', 'Problem Solving'],
            'goal'    => 'To design efficient information systems for large organizations.',
            'fun'     => 'Cannot start any project without a whiteboard and a marker.',
        ],
        [
            'photo'   => 'baby.jpg',
            'name'    => 'Ashley Krizzhia Rhaye Rhoda',
            'role'    => 'Project Manager',
            'icon'    => 'fas fa-tasks',
            'desc'    => 'Responsible for planning, organizing, and managing project activities.',
            'about'   => "I keep the team organized and on schedule. I set the timeline, assign tasks, and check progress so every deadline is met. I believe good communication and teamwork are what make a project successful.",
            'skills'  => ['Task Planning', 'Time Management', 'Leadership', 'Team Coordination', 'Risk Management'],
            'goal'    => 'To lead IT projects from idea to successful launch.',
            'fun'     => 'Has a color-coded checklist for everything, even her groceries.',
        ],
        [
            'photo'   => 'bro.jpg',
            'name'    => 'Joshua Dane',
            'role'    => 'Technical Writer',
            'icon'    => 'fas fa-file-alt',
            'desc'    => 'Responsible for preparing, documenting, and organizing technical information.',
            'about'   => "I turn complicated technical work into clear and organized documents. I write the manuals, reports, and system documentation so anyone can understand how our project works. For me, a project isn't finished until it's well documented.",
            'skills'  => ['Documentation', 'User Manuals', 'Research', 'Proofreading', 'MS Office'],
            'goal'    => 'To become a professional technical documentation specialist.',
            'fun'     => 'Always finds typos in menus, posters, and even road signs.',
        ],
    ];
    ?>
    <section class="team section" id="team">
        <div class="section-heading">
            <p>MEET THE PEOPLE BEHIND THE PROJECT</p>
            <h2>Our <span>Team</span></h2>
            <p class="section-description">
                A team of passionate individuals working together
                to turn ideas into reality.
            </p>
        </div>

        <div class="team-container">
            <?php foreach ($team as $i => $m) : ?>
            <div class="team-card">
                <div class="team-card-inner">
                    <div class="team-card-front">
                        <img src="<?php echo $img . esc_attr($m['photo']); ?>" alt="<?php echo esc_attr($m['role']); ?>">
                        <h3><?php echo esc_html($m['role']); ?></h3>
                        <p>Hover to discover my role</p>
                    </div>
                    <div class="team-card-back">
                        <i class="<?php echo esc_attr($m['icon']); ?>"></i>
                        <h3><?php echo esc_html($m['role']); ?></h3>
                        <p><?php echo esc_html($m['desc']); ?></p>
                        <button type="button" class="about-btn" data-about="<?php echo $i; ?>">
                            About Me
                        </button>
                    </div>
                </div>

                <!-- Content used by the modal -->
                <template id="about-<?php echo $i; ?>">
                    <div class="about-header">
                        <img src="<?php echo $img . esc_attr($m['photo']); ?>" alt="<?php echo esc_attr($m['name']); ?>">
                        <div>
                            <h3><?php echo esc_html($m['name']); ?></h3>
                            <span class="about-role"><?php echo esc_html($m['role']); ?></span>
                        </div>
                    </div>
                    <h4>About Me</h4>
                    <p><?php echo esc_html($m['about']); ?></p>
                    <h4>Skills</h4>
                    <div class="about-tags">
                        <?php foreach ($m['skills'] as $s) : ?>
                            <span><?php echo esc_html($s); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <h4>Goal</h4>
                    <p><?php echo esc_html($m['goal']); ?></p>
                    <h4>Fun Fact</h4>
                    <p><?php echo esc_html($m['fun']); ?></p>
                </template>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ABOUT ME MODAL (outside the cards so the flip doesn't affect it) -->
    <div class="about-modal" id="aboutModal" aria-hidden="true">
        <div class="about-modal-box" role="dialog" aria-modal="true">
            <button type="button" class="about-close" id="aboutClose" aria-label="Close">&times;</button>
            <div id="aboutContent"></div>
        </div>
    </div>

    <!-- SKILLS SECTION -->
    <?php
    // ===== I-EDIT DITO ANG EXPERT SKILLS NG BAWAT MEMBER =====
    // Format: ['Skill name', 'Short detail', 'Font Awesome icon']
    $skillset = [
        [
            'name'   => 'Welfred Ragmac',
            'role'   => 'Programmer',
            'photo'  => 'wel.jpg',
            'skills' => [
                ['HTML5',      'Builds clean, semantic page structures.', 'fab fa-html5'],
                ['CSS3',       'Creates responsive layouts and dark/light themes.', 'fab fa-css3-alt'],
                ['JavaScript', 'Adds interactive features like menus and pop-ups.', 'fab fa-js'],
                ['PHP',        'Writes the contact form handler and WordPress theme.', 'fab fa-php'],
                ['MySQL',      'Connects the system to the database to save records.', 'fas fa-database'],
            ],
        ],
        [
            'name'   => 'Elylordi Adaro',
            'role'   => 'System Analyst',
            'photo'  => 'elykyuti.jpg',
            'skills' => [
                ['Requirements Gathering', 'Interviews users to define what the system needs.', 'fas fa-clipboard-list'],
                ['ERD & DFD',              'Maps data and process flow before coding starts.', 'fas fa-diagram-project'],
                ['UML Diagrams',           'Draws use case and class diagrams for the developers.', 'fas fa-sitemap'],
                ['MySQL',                  'Designs the tables and relationships that keep data consistent.', 'fas fa-database'],
                ['Problem Solving',        'Finds the right solution before the system is built.', 'fas fa-lightbulb'],
            ],
        ],
        [
            'name'   => 'Ashley Krizzhia Rhaye Rhoda',
            'role'   => 'Project Manager',
            'photo'  => 'baby.jpg',
            'skills' => [
                ['Task Planning',    'Breaks the project into clear tasks and milestones.', 'fas fa-list-check'],
                ['Time Management',  'Sets realistic deadlines and tracks progress.', 'fas fa-clock'],
                ['Leadership',       'Guides the team and assigns work by strengths.', 'fas fa-users-gear'],
                ['Team Coordination', 'Keeps every member updated and working together.', 'fas fa-people-group'],
                ['Risk Management',  'Spots problems early and adjusts the plan.', 'fas fa-shield-halved'],
            ],
        ],
        [
            'name'   => 'Joshua Dane',
            'role'   => 'Technical Writer',
            'photo'  => 'bro.jpg',
            'skills' => [
                ['Documentation',        'Records how the system is built and how it works.', 'fas fa-file-lines'],
                ['User Manuals',         'Writes step-by-step guides for end users.', 'fas fa-book-open'],
                ['Research',             'Gathers accurate information for reports.', 'fas fa-magnifying-glass'],
                ['Proofreading',         'Checks every document for grammar and accuracy.', 'fas fa-spell-check'],
                ['MS Office',            'Formats reports and documents professionally.', 'fas fa-file-word'],
            ],
        ],
    ];
    ?>
    <section class="skill section" id="skill">
        <div class="section-heading">
            <p>WHAT WE CAN DO</p>
            <h2>Our Technical <span>Skills</span></h2>
            <p class="section-description">
                The skills each of us is an expert in, based on our role in the team.
            </p>
        </div>

        <div class="skills-showcase">

            <!-- LEFT: ROLE SELECTOR -->
            <div class="skills-nav" role="tablist" aria-label="Team roles">
                <?php foreach ($skillset as $i => $k) : ?>
                <button type="button"
                        class="skills-tab<?php echo $i === 0 ? ' active' : ''; ?>"
                        role="tab"
                        data-skill-tab="<?php echo $i; ?>"
                        aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                    <img class="skills-tab-avatar" width="48" height="48" src="<?php echo $img . esc_attr($k['photo']); ?>" alt="<?php echo esc_attr($k['name']); ?>">
                    <span class="skills-tab-text">
                        <strong><?php echo esc_html($k['role']); ?></strong>
                        <small><?php echo esc_html($k['name']); ?></small>
                    </span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- RIGHT: SKILLS OF THE SELECTED PERSON -->
            <div class="skills-panels">
                <?php foreach ($skillset as $i => $k) : ?>
                <div class="skills-panel<?php echo $i === 0 ? ' active' : ''; ?>" id="skills-panel-<?php echo $i; ?>" role="tabpanel">
                    <div class="skills-panel-head">
                        <span class="skill-role"><?php echo esc_html($k['role']); ?></span>
                        <h3><?php echo esc_html($k['name']); ?></h3>
                        <p class="skills-count"><?php echo count($k['skills']); ?> expert skills</p>
                    </div>

                    <div class="skills-grid">
                        <?php foreach ($k['skills'] as $n => $sk) : ?>
                        <div class="skills-tile">
                            <span class="skills-tile-icon"><i class="<?php echo esc_attr($sk[2]); ?>"></i></span>
                            <strong><?php echo esc_html($sk[0]); ?></strong>
                            <span class="skills-tile-text"><?php echo esc_html($sk[1]); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- PROJECT SECTION -->
    <section class="project section" id="project">
        <div class="section-heading">
            <p>OUR RECENT WORK</p>
            <h2>Featured <span>Projects</span></h2>
            <p class="section-description">
                Some of the projects we have developed and worked on.
            </p>
        </div>

        <div class="project-container">
            <div class="project-card">
                <img src="<?php echo $img; ?>system.jpg" alt="Parking & Fuel Management System">
                <div class="project-info">
                    <span>WEB AND MOBILE DEVELOPMENT</span>
                    <h3>Parking &amp; Fuel Management</h3>
                    <p>A digital platform for managing parking reservations, vehicle information, parking slot availability, and fuel operations.</p>
                    <a href="#" class="project-link">View Project <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo $img; ?>portfolio.png" alt="Portfolio Website">
                <div class="project-info">
                    <span>FRONTEND DEVELOPMENT</span>
                    <h3>Team Portfolio Website</h3>
                    <p>A responsive team website showcasing our background, technical skills, and development projects.</p>
                    <a href="#" class="project-link">View Project <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact section" id="contact">
        <div class="section-heading">
            <p>GET IN TOUCH WITH US</p>
            <h2>Contact <span>Us</span></h2>
            <p class="section-description">
                Have a question or want to work with us? Send us a message.
            </p>
        </div>

        <div class="contact-wrapper">

            <!-- LEFT: TEAM DIRECTORY -->
            <?php
            // ===== I-EDIT DITO ANG MGA LINK NG BAWAT MEMBER =====
            // Palitan ang github / messenger / tiktok ng totoong profile links
            $contacts = [
                [
                    'photo'     => 'wel.jpg',
                    'name'      => 'Welfred Ragmac',
                    'role'      => 'Programmer',
                    'gmail'     => 'ragmacwelfred1@gmail.com',
                    'github'    => 'https://github.com/',
                    'messenger' => 'https://m.me/',
                    'tiktok'    => 'https://www.tiktok.com/',
                ],
                [
                    'photo'     => 'elykyuti.jpg',
                    'name'      => 'Elylordi Adaro',
                    'role'      => 'System Analyst',
                    'gmail'     => 'elylordiadaro8@gmail.com',
                    'github'    => 'https://github.com/',
                    'messenger' => 'https://m.me/',
                    'tiktok'    => 'https://www.tiktok.com/',
                ],
                [
                    'photo'     => 'baby.jpg',
                    'name'      => 'Ashley Krizzhia Rhaye Rhoda',
                    'role'      => 'Project Manager',
                    'gmail'     => 'ashleykrizzhiarhayedediosrhoda@gmail.com',
                    'github'    => 'https://github.com/',
                    'messenger' => 'https://m.me/',
                    'tiktok'    => 'https://www.tiktok.com/',
                ],
                [
                    'photo'     => 'bro.jpg',
                    'name'      => 'Joshua Dane',
                    'role'      => 'Technical Writer',
                    'gmail'     => 'christan@gmail.com',
                    'github'    => 'https://github.com/',
                    'messenger' => 'https://m.me/',
                    'tiktok'    => 'https://www.tiktok.com/',
                ],
            ];
            ?>
            <div class="contact-team-list">
                <h3>Meet the Team</h3>

                <?php foreach ($contacts as $c) : ?>
                <div class="team-list-item">
                    <div class="team-list-left">
                        <img src="<?php echo $img . esc_attr($c['photo']); ?>" alt="<?php echo esc_attr($c['name']); ?>">
                        <div>
                            <h4><?php echo esc_html($c['name']); ?></h4>
                            <p><?php echo esc_html($c['role']); ?></p>
                        </div>
                    </div>

                    <div class="contact-icons">
                        <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=<?php echo esc_attr($c['gmail']); ?>&amp;su=Inquiry" target="_blank" rel="noopener" class="icon-gmail" aria-label="Gmail" title="Gmail"><img src="<?php echo $img; ?>gmail.png" width="20" height="20" alt="Gmail"></a>
                        <a href="<?php echo esc_url($c['github']); ?>" target="_blank" rel="noopener" class="icon-github" aria-label="GitHub" title="GitHub"><img src="<?php echo $img; ?>github.png" width="20" height="20" alt="GitHub"></a>
                        <a href="<?php echo esc_url($c['messenger']); ?>" target="_blank" rel="noopener" class="icon-messenger" aria-label="Messenger" title="Messenger"><img src="<?php echo $img; ?>messenger.png" width="20" height="20" alt="Messenger"></a>
                        <a href="<?php echo esc_url($c['tiktok']); ?>" target="_blank" rel="noopener" class="icon-tiktok" aria-label="TikTok" title="TikTok"><img src="<?php echo $img; ?>ttk.png" width="20" height="20" alt="TikTok"></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- RIGHT: GENERAL INQUIRY FORM -->
            <div class="contact-form-container">
                <h3>General Inquiry</h3>
                <p class="form-subtitle">Send us a direct message at <strong>semicolon@gmail.com</strong></p>

                <form class="contact-form" id="contactForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="semicolon_contact">
                    <div style="position:absolute;left:-9999px;" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="Your full name" required>
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="input-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="e.g., Web project collaboration" required>
                    </div>
                    <div class="input-group">
                        <label>Message</label>
                        <textarea name="message" rows="5" placeholder="Tell us about yourself or your organization, what you need, and any relevant timeline or project details." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Send message
                    </button>
                    <?php
                    $status = isset($_GET['contact']) ? sanitize_key($_GET['contact']) : '';
                    $messages = [
                        'sent'    => 'Thank you! Your message has been sent.',
                        'invalid' => 'Please fill in all fields with a valid email.',
                        'failed'  => 'Sorry, the message could not be sent. Please try again later.',
                    ];
                    ?>
                    <p class="form-status <?php echo $status === 'sent' ? 'success' : 'error'; ?>" id="formStatus">
                        <?php echo isset($messages[$status]) ? esc_html($messages[$status]) : ''; ?>
                    </p>
                </form>
            </div>

        </div>
    </section>

<?php get_footer(); ?>