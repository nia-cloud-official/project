<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Quiz from PDF</title>
</head>
<body>
    <h1>Generate Quiz from PDF</h1>
    <form action="process_quiz.php" method="post">
        <label for="pdf-file">Select a PDF file:</label>
        <input type="file" name="pdf-file" id="pdf-file" accept="application/pdf" required>
        <button type="submit">Generate Quiz</button>
    </form>
</body>
</html>