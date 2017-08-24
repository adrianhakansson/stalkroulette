<?php include "../templates/header.php" ?>

<script>
// Higlight navbar
$(document).ready(function(){
    $("#settings").addClass("active");
});
</script>

<div id="content-settings">
    <h1 id="title">Filter by country</h1> 

    <hr>
    <div id="container"></div>

</div>

<!-- Main script -->
<script src="/scripts/settings.js"></script>

<?php include "../templates/footer.php" ?>
