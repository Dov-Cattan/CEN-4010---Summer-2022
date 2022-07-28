<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Property</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .sub-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        input[type='text'] {
            width: 100%;
        }

        textarea {
            width: 100%;
        }

        input {
            margin-bottom: 20px;
        }

        #cost {
            max-width: 150px;
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
<?php
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<div>
    <div class="container text-center">
        <div class="sub-container">
            <h1>Submit a Ticket</h1>
            <?php if (isset($_POST['problem_name'])) : ?>
                <p style="color: green; text-align: center">A support agent will be in touch soon. Thank You!</p>
            <?php else : ?>
            <form action="" method="post">
                <label for="problem-name">Name: </label><br><input type="text" name="problem_name" id="problem-name"><br>
                <label for="problem-contact">Contact Info: </label><br><input type="text" name="problem_contact" id="problem-contact">
                <label for="problem-description">Problem: </label><br>
                <textarea name="problem_description" id="problem-description" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
