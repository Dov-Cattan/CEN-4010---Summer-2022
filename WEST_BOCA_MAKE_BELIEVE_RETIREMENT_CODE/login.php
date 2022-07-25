<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
</head>
<body>
<?php include_once('session.php'); ?>
<?php include_once('navigation.php'); ?>

<div style="margin-bottom: 0px" class="jumbotron">
    <div class="container text-center">
        <h1>Login</h1>
        <form method="post" action="">
            <label style="margin-right: 5px">Email: </label>
            <input name="email" style="margin-right: 10px" type="text"></label>
            <label style="margin-right: 5px">Password: </label>
            <input name="password" type="text"></label>
            <button type="submit" value="Submit">Submit</button>
        </form>
    </div>
</div>

<?php
global $mysqli;
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}
if (isset($_POST['email'])) {
    $result = $mysqli->query("SELECT * FROM users WHERE email = '{$_POST['email']}' AND password = '{$_POST['password']}'");
    if ($result->num_rows == 0) {
        echo '<p style="color: red">email password combination is wrong!</p>';
    } else {
        $row = $result->fetch_array();
        $_SESSION['uid'] = $row['uid'];
        header('Location: index.php');
        exit;
    }
}
?>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
