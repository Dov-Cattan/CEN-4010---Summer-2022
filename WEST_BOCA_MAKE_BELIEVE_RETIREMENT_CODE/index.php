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
    <link rel="stylesheet" href="style.css">
    <style>
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
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM properties WHERE uid={$_SESSION['user']['uid']}");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="row" style="margin: 0 auto">
        <?php foreach ($rows as $row) : ?>
            <div class="col-md-4">
                <h2><?= $row['name']; ?></h2>
                <?php if ($row['picture']) : ?>
                    <img src="http://<?= $_SERVER['HTTP_HOST'] . '/' . $row['picture']; ?>" class="img-responsive"
                         style="width:100%" alt="Image">
                <?php endif; ?>
                <p><?= $row[1]; ?></p>
                <?php if ($row['video']) : ?>
                    <video width="320" height="240" controls>
                        <source src="http://<?= $_SERVER['HTTP_HOST'] . '/' . $row['video']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
                <p><a href="/update-property.php?pid=<?= $row['property_id']; ?>">Edit</a> | <a
                            href="/update-property.php?delete=<?= $row['property_id']; ?>">Delete</a></p>
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
