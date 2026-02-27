<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form example</title>
</head>

<body>

    <h2>Form example</h2>

    <form action="index.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Email:</label>
        <input type="email" name="email">

        <br><br>

        <label>Age:</label>
        <input type="number" name="age">

        <br><br>

        <button type="submit">Send</button>
    </form>

</body>

</html>