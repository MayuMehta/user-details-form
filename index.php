<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" class="form">
        <div class="user">
            <h2>User Details</h2>
            <div>
                <label for="name" >Name: </label><br>
                <input type="text" name="name" class="user-input" required>
            </div>

            <div>
                <label for="email"> Email: </label><br>
                <input type="email" name="email" class="user-input" required>
            </div>

            <div>
                    <label for="message">Message: </label><br>
                    <textarea name="message" class="user-message" required rows="5"></textarea>
            </div>

            <input type="submit" id="submit" value="Submit">
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $dataToWrite = "Name: $name\nEmail: $email\nMessage: $message\n\n";

        $file = fopen("user_details.txt", "a");
        if ($file) {
            fwrite($file, $dataToWrite);
            fclose($file);
            echo '<script>alert("Details saved successfully!")</script>';
        } else {
            echo '<script>alert("Error writing to file.")</script>';
        }
    }
    ?>
</body>
</html>