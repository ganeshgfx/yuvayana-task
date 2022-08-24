<?php

if (isset($_REQUEST['question'])) {
    saveQuestion($_REQUEST['question'],$_REQUEST['options'],$_REQUEST['answer']);
}
function saveQuestion($question,$options,$answer)
{
    $host = "localhost";
    $userName = "root";
    $userPassword = "";
    $dataBaseName = "is_task";

    $conn = new mysqli($host, $userName, $userPassword, $dataBaseName);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    }
    try {
        $sql = "INSERT INTO question(question,options,answer) VALUES (?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sss", $q,$o,$a);
        $q = $question;
        $o = $options;
        $a = $answer;
        if ($statement->execute())
           echo "Question Added";
    } catch (exception $e) {
        echo "Error - ".$e->getMessage();
    }
    $conn->close();
}