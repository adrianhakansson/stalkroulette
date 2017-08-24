<?php 

    $conn = new PDO('sqlite:'.getcwd().'/mydb.sq3'); // getcwd() == getcurrentworkdirectory()
    if (isset($_POST["filter"])) {
        $sql = $conn->prepare("SELECT * FROM cameras WHERE origin = '{$_POST['filter']}' ORDER BY RANDOM() LIMIT 1");
    }
    else {
    $sql = $conn->prepare("SELECT * FROM cameras ORDER BY RANDOM() LIMIT 1");
    }
    $sql->execute();
    $result = $sql->fetchAll();
    $origin = strtolower($result[0]["origin"]);

    $myObj->url = $result[0]["fullurl"];
    $myObj->ip = $result[0]["ipaddress"];
    $myObj->origin = $origin;
    $myJSON = json_encode($myObj);
    echo $myJSON;
?>