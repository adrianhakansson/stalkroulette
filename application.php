<?php include "templates/header.php" ?>

<?php
if (!isset($_COOKIE["acceptedTerms"])) {
    if(isset($_POST)) {
        $checkBox = $_POST["checkBox"];
    }
    else {
        header("Location: /");
        die();
    }
    if ($checkBox == "" ) {
        header("Location: /");
        die();
    }
    else {
        setcookie("acceptedTerms",True);
    }
}
?>
<script>
// Higlight navbar
$(document).ready(function(){
    $("#home").addClass("active");
});
</script>

<div id="content-application">
    <div id="stream-items">
        <canvas id="canvas" width="100" height="100"> </canvas>
        <button class="stream-buttons" onclick="next()">Next</button>
        <button class="stream-buttons" onclick="window.location='#openReport'">Report</button>
    </div>
    
    <div id="openReport" class="modalDialog">
        <div>
            <a href="#" class="close">X</a>
            <h2>Report stream</h2>
            <p>Why are you reporting this stream?</p>
            <form action="/report.php" method="POST">
                <select name="reportReason">
                    <option selected style="display:none">Choose a reason</option>
                    <option>The stream doesn't show up/doesn't work properly</option>
                    <option>The stream contains inappropriate content</option>
                    <option>The stream infringes my copyright</option>
                    <option>I just don't like it</option>
                    <option>Other (specify below)</option>
                </select>
                <textarea width="100px" placeholder="If needed, specify the issue here" name="message"></textarea>
                
                <input type="hidden" id="reportURL" name="streamURL"> <!-- Lazy way to pass stream url to report window -->
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <div id="facts">
        <img id="origin"></img>
        <h3>Statistics</h3>
        <p id="originP"></p> 
        <p id="ip">IP: </p>
    </div>
</div>

<!-- Main script -->
<script src="scripts/application.js"></script>


<?php include "templates/footer.php" ?>