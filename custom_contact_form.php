<?php
/*
Plugin Name: Custom Contact Form
Description: A simple custom contact form plugin.
Version: 1.0
Author: Habiba
*/

if (isset($_POST['submit_contact'])) {

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    wp_mail(
        get_option('admin_email'),
        'New Contact Form Message',
        "Name: $name\nEmail: $email\nMessage: $message"
    );
}

function custom_contact_form() {
    ob_start();
    ?>

    <style>
.contact-form {
    max-width: 500px;
    margin: 40px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.contact-form h2 {
    text-align: center;
    margin-bottom: 25px;
}

.contact-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-sizing: border-box;
}

.contact-form textarea {
    height: 120px;
    resize: vertical;
}

.contact-form button {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 8px;
    background: #0073aa;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.contact-form button:hover {
    background: #005f8d;
}
</style>

    <form method="post">
        
        <div class="contact-form">

    <h2>Contact Us</h2>
    <p>Have a question? Send us a message!</p>

        <label>Name</label>
        <input type="text" name="name" required>

        <br><br>

        <label>Email</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Message</label>
        <textarea name="message" required></textarea>

        <br><br>

        <button type="submit" name="submit_contact">Send Message</button>
    </form>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('custom_contact_form', 'custom_contact_form');