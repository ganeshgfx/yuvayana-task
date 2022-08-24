<?php

$questions = getData('question');
$que_ids = [];
foreach ($questions as $i => $que) {
    $que_ids[] = $que->question_id;
}


function getData($table)
{

    $host = "localhost";
    $userName = "root";
    $userPassword = "";
    $dataBaseName = "is_task";

    $conn = new mysqli($host, $userName, $userPassword, $dataBaseName);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    }

    $return = [];
    $sql = "SELECT `question_id`,`question`,`options` FROM $table";
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper</title>
    <link rel="stylesheet" href="style.css">
    <script>
        const que_ids = JSON.parse('<?php
            echo json_encode($que_ids);
            ?>');
    </script>
</head>
<body>
<form class="main-div" id="question_form" onsubmit="event.preventDefault();check();">

    <?php
    foreach ($questions as $i => $question) {
        //echo json_encode($question);

        $options = "";

        foreach (json_decode($question->options) as $j => $option) {
            $options .= "<div class='questions'>
            <input type='radio' value='$j' checked name='c{$question->question_id}' id='c{$question->question_id}'>
            <h4>$option </h4>
        </div>";
        }

        echo("
<fieldset>
        <div class='head'>
            <h3>Question : {$question->question}</h3>
        </div>
        <hr>
        {$options}
       </fieldset>
            ");
    }
    ?>
    <div class="submit">
        <button>Submit</button>
    </div>
    <fieldset>
        <div class='head'>
            <h3 id="score" style="color: #365223">Submit to view score</h3>
        </div>
    </fieldset>
</form>
<script src="script.js"></script>
</body>
</html>