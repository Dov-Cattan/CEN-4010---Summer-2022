<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Cane Tank</title>
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
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "root", "senior");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (!isset($_SESSION['uid'])) {
    header('Location: login.php');
    exit;
}
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><img src="thecanetanklogo.png" class="img-responsive" style="width:50px;height:50px" alt="Image">
                </li>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="update-profile.html">Update Profile</a></li>
                <li><a href="create-property.php">Create Property</a></li>
                <!--            We dont need this, each property in the home page will have an edit button and thats how you get to this page.-->
                <!--        <li><a href="update-property.html">Update Property</a></li> -->
                <li><a href="minigame.html">Play Minigame</a></li>
                <li><a href="#">Authorize Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container text-center">
        <h1>The Cane Tank</h1>
        <p> This is a tank where you can place all of your property including your supplies
        </p>
    </div>
</div>

<div class="container bg-3 text-center">
    <h3>My Property</h3><br>
    <?php
    $result = $mysqli->query("SELECT * FROM properties WHERE uid={$_SESSION['uid']}");
    $rows = $result->fetch_all();
    ?>
    <div class="row" style="margin: 0 auto">
        <?php foreach ($rows as $row) : ?>
            <div class="col-md-4">
                <h2><?= $row[1]; ?></h2>
                <img src="http://<?= $_SERVER['HTTP_HOST'] . '/' . $row[4]; ?>" class="img-responsive" style="width:100%" alt="Image">
                <p><?= $row[1]; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<br><br>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
