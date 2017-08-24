<?php include "templates/header.php" ?>
<script>
    // Higlight navbar
    $(document).ready(function(){
        $("#home").addClass("active");
    });

    if ($.cookie("acceptedTerms") == 1) {
        window.location.href="application.php";
    }

</script>

<div id="content-index">
    <h1 style="clear:both;">Stalkroulette</h1>
    <p>
        By entering this website you accept the fact that I take no responsibility for the content shown by streams on this website. Please report streams showing too inappropriate content. You also accept that I store a few cookies. :)
    </p>
    <hr />
    <form action="application.php" method="POST">
        <input name="checkBox" type="checkbox">I Accept
        <br />
        <input type="submit" value="Start">
    </form>
</div>

<?php include "templates/footer.php" ?>