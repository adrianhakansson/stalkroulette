<?php 

if($_SERVER["REQUEST_METHOD"] === "GET") {
        header("Location: /");
        die();
    }
    $reportReason;$message;$streamURL;
    if(isset($_POST["reportReason"])){
        $reportReason = test_input($_POST["reportReason"]);

    }
    if(isset($_POST["message"])){
        $message = test_input($_POST["message"]);

    }   
    if(isset($_POST["streamURL"])){
        $streamURL = test_input($_POST["streamURL"]);

    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$ip = $_SERVER["REMOTE_ADDR"];
$sendTo = "contact@adrianh.xyz";
$subject = "Report Ticket";
$text = "Reporter IP: ".$ip." \r\n Reported stream: ".$streamURL." \r\n Report reason: ".$reportReason." \r\n Message: ".$message;
$headers = "Content-type:text/html;charset=UTF-8". "\r\n";
$headers .= "From: Stalkroulette Report <report@adrianh.xyz>"."\r\n";

mail($sendTo,$subject,$text,$headers);
header("Location: /");
?>
