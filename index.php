<?php
$host = 'localhost';
$username = 'root';
$passsword = '';
$dbname = 'tehseen_crud';

$conn = new mysqli($host, $username, $passsword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// session_start();

if (isset($_SESSION['user'])) {
    header("Location: app.php");
    exit;
}

$sql = "SELECT name, email, password FROM users";
$result = $conn->query($sql);
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $_POST['email']) {
                if ($row['password'] == $_POST['password']) {
                    $_SESSION['user'] =  $row['name'];
                    header("Location: app.php");
                    exit;
                    break;
                } else {
                    $error = "Invalid user name or Password";
                }
            }
        }
    } else {
        echo "0 results";
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login | Test Login</title>
</head>

<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form method="POST">
            <input placeholder="email@example.com" class="in-field" type="text" name="email" id="email">
            <input placeholder="password" class="in-field" type="password" name="password" id="password">
            <span class="error" id="error"><?php echo $error; ?></span>
            <input class="btn" type="submit" name="submit" id="login" value="Login"><br>
            <a class="forgot" href="#">Forgot Password?</a>
        </form>
    </div>
</body>

</html>