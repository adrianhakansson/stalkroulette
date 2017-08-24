<?php include "../templates/header.php" ?>
<script>
// Higlight navbar
$(document).ready(function(){
    $("#contact").addClass("active");
});
</script>
<div id ="content-contact">
    <h1>Contact</h1>
    <hr/>
    <p>Please use the form below to get in contact with me.</p>
    <div id="contact-form">
        <form action="/submit_form.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Your name">
            <br/>
            <input type="email" id="email" name="email" placeholder="Your Email address">
            <br/>
            <textarea id="message" name="message" placeholder="Your message"></textarea>
            <br/>
            <div class="g-recaptcha" data-sitekey="6Lc1lyMUAAAAAMgLOmecESYO-rwUxZE7_256bQGG"></div>
            <input class="right" type="submit" value="Send">
        </form>
    </div>
</div>

<?php include "../templates/footer.php" ?>