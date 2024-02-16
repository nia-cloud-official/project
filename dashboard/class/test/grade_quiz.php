<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Quiz</title>
</head>
<body>
    <h1>Grade Quiz</h1>
    <?php
    // Load questions and answers from text files
    $questions = file('questions.txt', FILE_IGNORE_NEW_LINES);
    $answers = file('answers.txt', FILE_IGNORE_NEW_LINES);

    // Shuffle questions