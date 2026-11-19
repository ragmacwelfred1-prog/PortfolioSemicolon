<?php
function semicolon_assets() {
    wp_enqueue_style('poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
    wp_enqueue_style('semicolon-style', get_template_directory_uri() . '/assets/css/css.css', [], '2.6');
    wp_enqueue_script('semicolon-js', get_template_directory_uri() . '/assets/js/js.js', [], '2.4', true);
}
add_action('wp_enqueue_scripts', 'semicolon_assets');

add_theme_support('title-tag');

/* =====================================================
   CONTACT FORM HANDLER
   Dito napupunta ang mga mensahe galing sa form.
===================================================== */
function semicolon_handle_contact() {
    $back = home_url('/');

    // Honeypot: kapag napunan ito, bot ang nag-submit
    if (!empty($_POST['website'])) {
        wp_safe_redirect($back . '?contact=sent#contact');
        exit;
    }

    $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $subject = sanitize_text_field(wp_unslash($_POST['subject'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if ($name === '' || $subject === '' || $message === '' || !is_email($email)) {
        wp_safe_redirect($back . '?contact=invalid#contact');
        exit;
    }

    // ===== DITO PUMUPUNTA ANG MGA MENSAHE =====
    // Palitan kung gusto mo ng ibang email, halimbawa: 'team@gmail.com'
    $to = get_option('admin_email');

    $headers = ['Reply-To: ' . $name . ' <' . $email . '>'];
    $body    = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message\n";

    $sent = wp_mail($to, '[Semicolon Portfolio] ' . $subject, $body, $headers);

    wp_safe_redirect($back . '?contact=' . ($sent ? 'sent' : 'failed') . '#contact');
    exit;
}
add_action('admin_post_nopriv_semicolon_contact', 'semicolon_handle_contact');
add_action('admin_post_semicolon_contact', 'semicolon_handle_contact');