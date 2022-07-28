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
            <?php if (isset($_POST['emails'])) : ?>
                <p style="color: green; text-align: center">Authorized users will receive an email with and password
                    to access until <?= $_POST['authorize_date']; ?>.</p>
            <?php else : ?>
                <h1>Authorize Users</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <label for="property-name">Emails: </label><br/>
                    <em>(Enter a comma separated list of email addresses)</em><br/>
                    <input required type="text" name="emails" id=""><br/>
                    <label for="property-description">Expiration: </label><br/>
                    <em>When should this authorization expire?</em><br />
                    <input type="date" id="start" name="authorize_date">
                    <input type="submit" value="Authorize Users">
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
