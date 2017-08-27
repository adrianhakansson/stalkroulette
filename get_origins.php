<?php 
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        header("Location: /");
    }
    else {
    $conn = new PDO('sqlite:'.getcwd().'/mydb.sq3'); // getcwd() == getcurrentworkdirectory()
    $sql = $conn->prepare("SELECT origin FROM cameras");
    $sql->execute();
    $result = $sql->fetchAll();
    echo json_encode($result);
    }
?>



