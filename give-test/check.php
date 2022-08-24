<?php
if (isset($_REQUEST['options'])) {
    $questions = getData();
    //echo json_encode($questions);
    $score = 0;
    $req = json_decode($_REQUEST['options']);
    foreach ($req as $id){
        $q = json_decode($id);
//        echo ($q->a)."-";
//        echo getAns($q->q)."|";
        if((int)$q->a==(int)getAns($q->q)){
            $score++;
        }
    }
    echo $score;
}


function getData()
{
    $host = "localhost";
    $userName = "root";
    $userPassword = "";
    $dataBaseName = "is_task";

    $conn = new mysqli($host, $userName, $userPassword, $dataBaseName);

    $return = [];
    $sql = "SELECT * FROM question";
    if ($result = $conn->query($sql)) {
        while ($obj = $result->fetch_object()) {
            $return[] = $obj;
        }
        $result->free_result();
        $conn->close();
        return ($return);
    } else {
        $conn->close();
        return ("error");
    }
}
function getAns($id)
{
    $host = "localhost";
    $userName = "root";
    $userPassword = "";
    $dataBaseName = "is_task";

    $conn = new mysqli($host, $userName, $userPassword, $dataBaseName);

    $return = [];
    $sql = "SELECT * FROM question WHERE question_id = $id";
    if ($result = $conn->query($sql)) {
        while ($obj = $result->fetch_object()) {
            return ($obj->answer);
        }
        $result->free_result();
        $conn->close();

    } else {
        $conn->close();
        return ('error');
    }
}