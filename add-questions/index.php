<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form class="main-div" id="question_form" onsubmit="event.preventDefault();save();">
    <div class="head">
        <h3>Question :</h3>
    </div>
    <div class="questions">
        <input type="radio"  style="opacity: 0%">
        <input class="grow" id="question" placeholder="Please enter question data" type="text">
    </div>
    <div class="questions">
        <input type="radio" checked name="option" id="ans1">
        <input type="text" id="option1" placeholder="Option 1">
    </div>
    <div class="questions">
        <input type="radio" name="option" id="ans2">
        <input type="text" id="option2" placeholder="Option 2">
    </div>
    <div class="questions">
        <input type="radio" name="option" id="ans3">
        <input type="text" id="option3" placeholder="Option 3">
    </div>
    <div class="questions">
        <input type="radio" name="option" id="ans4">
        <input type="text" id="option4" placeholder="Option 4">
    </div>
    <div class="submit">
        <button>Submit</button>
    </div>
</form>
<script src="script.js"></script>
</body>
</html>