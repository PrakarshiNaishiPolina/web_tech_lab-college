<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    
    // Full Name Validation
    $fullname = trim($_POST["fullname"]);
    if (!preg_match("/^[a-zA-Z ]{3,50}$/", $fullname)) {
        $errors[] = "Name should contain only alphabets & spaces, minimum 3 characters, maximum 50.";
    }

    // Email Validation
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Phone Validation
    $phone = $_POST["phone"];
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    // Age Validation
    $age = $_POST["age"];
    if (!is_numeric($age) || $age < 1 || $age > 99) {
        $errors[] = "Age must be a number between 1 and 99.";
    }

    // Gender Validation
    $gender = $_POST["gender"];
    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    // Country Validation
    $country = $_POST["country"];
    if (empty($country)) {
        $errors[] = "Please select a country.";
    }

    // Output Errors or Success Message
    if (!empty($errors)) {
        echo "<h1>Validation Errors:</h1>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Store Data in Cookies
        setcookie("fullname", $fullname, time() + 3600, "/");
        setcookie("email", $email, time() + 3600, "/");
        setcookie("phone", $phone, time() + 3600, "/");
        setcookie("age", $age, time() + 3600, "/");
        setcookie("gender", $gender, time() + 3600, "/");
        setcookie("country", $country, time() + 3600, "/");

        echo "<h1>Data Submitted Successfully!</h1>";
        echo "<a href='showpdf.php'>Download PDF</a>";
    }
}
?>
