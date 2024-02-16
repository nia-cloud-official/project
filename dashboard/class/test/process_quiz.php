<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz</h1>
    <?php
    if (isset($_FILES['pdf-file']) && !empty($_FILES['pdf-file']['tmp_name'])) {
        $pdf_file = $_FILES['pdf-file']['tmp_name'];
        $questions = [];
        $answers = [];
        $page = 0;

        // Extract questions and answers from PDF using pdftotext
        exec("pdftotext -f $page -l $page -layout -nopgbrk -q $pdf_file -", $output);
        foreach ($output as $line) {
            if (strpos($line, 'Question:') === 0) {
                $question = trim(substr($line, 9));
            } elseif (strpos($line, 'Answer:') === 0) {
                $answer = trim(substr($line, 8));
                $questions[] = $question;
                $answers[] = $answer;
            }
        }

        // Shuffle questions and answers to generate random quiz
        shuffle($questions);
        shuffle($answers);

        // Display questions and answers as a form
        for ($i = 0; $i < count($questions); $i++) {
            echo "<h2>{$questions[$i]}</h2>";
            echo "<p>{$answers[$i]}</p>";
            echo "<input type='hidden' name='questions[]' value='{$questions[$i]}'>";
            echo "<input type='hidden' name='answers[]' value='{$answers[$i]}'>";
        }

        // Save questions and answers to text files
        file_put_contents('questions.txt', implode("\n", $questions));
        file_put_contents('answers.txt', implode("\n", $answers));
    } else {
        exit;
    }
    ?>
    <form action="grade_quiz.php" method="post">
        <input type="submit" value="Submit Quiz">
    </form>
</body>
</html>