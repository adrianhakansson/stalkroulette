<?php include "../templates/header.php" ?>

<script>
// Higlight navbar
$(document).ready(function(){
    $("#faq").addClass("active");
});
</script>

<div id="content-faq">
    <h1>Frequently Asked Questions</h1>
    <hr/>
    <div id="faqs">
        <div class="faq-item">
            <p class="question">Q: Why?</p>
            <p class="answer">A: Because I believe the general public has to take cyber security and privacy more seriously. Hopefully this provocative website gets a few people to start thinking about privacy and online security.</p>
        </div>

        <div class="faq-item">
            <p class="question">Q: Is this even legal!?</p>
            <p class="answer">A: Yes. All streams on this website are already publicly available and open for anyone to access. Not a single password has been breached. Therefore, this website is not in violation of any law.</p>
        </div>

        <div class="faq-item">
            <p class="question">Q: Where do the streams come from?</p>
            <p class="answer">A: All streams available on this website are fetched from publicly available sources online. <b>None of the streams shown on this website have been compromised or hacked.</b>
        </div>
        <div class="faq-item">
            <p class="question">Q: Why doesn't the stream load?</p>
            <p class="answer">A: Some streams take a long time to load and a few doesn't even load at all. Depending on your internet connection, it is normal for streams to take up to about 10 seconds to load. If the stream still doesn't load, please <b>report</b> it and then click 'Next'. If streams doesn't load at all, please <a href="/contact">contact me</a>. 
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>