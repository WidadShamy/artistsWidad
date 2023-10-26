<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<div class="contact-page">
    <h1 class="contact-title">Contact Us</h1>
    <div class="contact-info">
        <p>Your feedback matters to us. We're here to listen.</p>
    </div>

    <form action="" method="post">
        <label for="userEmail">Your Email:</label>
        <input type="email" id="user-email" name="user-email" required>
        
        <label for="userMessage">Your Message:</label>
        <textarea id="msg" name="inquiry-msg" rows="3" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
</div>

<?php get_footer(); ?>
