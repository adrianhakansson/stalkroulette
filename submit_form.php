<?php 
    if($_SERVER["REQUEST_METHOD"] === "GET") {
        header("Location: /contact");
        die();
    }
    $name;$email;$message;$captcha;
    if(isset($_POST["name"])){
        $name = test_input($_POST["name"]);
        //$name = $_POST["name"];
    }
    if(isset($_POST["email"])){
        $email = test_input($_POST["email"]);
        //$email = $_POST["email"];
    }   
    if(isset($_POST["message"])){
        $message = test_input($_POST["message"]);
        //$message = $_POST["message"];
    }
    if(isset($_POST["g-recaptcha-response"])){
        $captcha = $_POST["g-recaptcha-response"];
    }
    if(!$captcha) {
        echo "<h2>Please check the captcha form.</h2>";
        die;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

    $secretKey = $_ENV["RECAPTCHA_KEY"];
    $ip = $_SERVER["REMOTE_ADDR"];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if (intval($responseKeys["success"]) !== 1) {
        echo "<h2>pls stop spamming</h2>";
    }
    else {
        $sendTo = "adrianhakansson99@gmail.com";
        $subject = "Contact Form";
        $message .= "\r\n Name:".$name;
        $headers = "Content-type:text/html;charset=UTF-8". "\r\n";
        $headers .= "From:".$name." <".$email.">"."\r\n";

        mail($sendTo,$subject,$message,$headers);
        header("Location: /");
    }



?>
