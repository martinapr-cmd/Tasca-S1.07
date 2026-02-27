<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';

    $errors = [];
    //empty field validation:
    if (empty($username)) {
        $errors[] = "Username cannot be empty";
    }
    if (empty($email)) {
        $errors[] = "Email cannot be empty";
    }
    if (empty($age)) {
        $errors[] = "Age cannot be empty";
    }

    //username validation:
    if (!empty($username) && !preg_match("/^[A-Za-z0-9_]+$/", $username)) {
        $errors[] = "Username can only contain letters, numbers and underscores.";
    }

    //email validation: 
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    //Age must be a number
    if (!empty($age) && !filter_var($age, FILTER_VALIDATE_INT)) {
        $errors[] = "Age must be a valid number.";
    }

    // If there are errors, show them and STOP
    if (!empty($errors)) {
        echo "<h2>There were errors :-(</h2>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo '<br><a href="form.php">Go back</a>';
        exit; // VERY IMPORTANT: stop execution
    }

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;


    echo "<h2>Form submitted successfully!</h2>";
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Age: " . $age . "<br>";

    echo "<h3>Values stored:</h3>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";

    echo '<br><a href="form.php">Submit again</a>';
} else {
    echo "<h2>Please submit the form first.</h2>";
    echo '<a href="form.php">Go to form</a>';
}
