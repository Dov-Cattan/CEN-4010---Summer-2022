<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Property</title>
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
            width: 150px;
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

            <a class="navbar-brand">West Boca Make Believe Retirement Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="create-property.php">Create Property</a></li>
                <!--<li><a href="#">Contact</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['uid'])) : ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
                <?php else : ?>
                    <li><a href="login.php?logout=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div>
    <div class="container text-center">
        <?php
        $result = $mysqli->query("SELECT * FROM properties WHERE property_id = {$_GET['pid']}");
        $row = $result->fetch_array();
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/';
        $target_file = $target_dir . basename($_FILES["property_picture"]["name"]);
        $target_video = $target_dir . basename($_FILES["property_video"]["name"]);
        if (isset($_POST['property_name'])) {
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/';
            $target_file = $_FILES["property_picture"]["tmp_name"] ? $target_dir . basename($_FILES["property_picture"]["name"]) : '';
            $target_video = $_FILES["property_video"]["tmp_name"] ? $target_dir . basename($_FILES["property_video"]["name"]) : '';
            move_uploaded_file($_FILES["property_picture"]["tmp_name"]);
            move_uploaded_file($_FILES["property_video"]["tmp_name"], $target_video);
            $sql = "UPDATE properties SET name='{$_POST['property_name']}', description='{$_POST['property_description']}', video='{$target_video}', picture='{$target_file}', cost='{$_POST['cost']}' WHERE property_id={$_POST['property_id']}";
            $update = $mysqli->query($sql);
            if (!$update) {
                echo '<p style="color: red">Sorry, there was an error inserting your property.</p>';
            } else {
                echo '<p style="color: green">Property successfully updated.</p>';
            }
        }
        if ($result->num_rows) : ?>
            <div class="sub-container">
                <h1>Update Property</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <label for="property-name">Name: </label><br/>
                    <input required type="text" name="property_name" id="property-name"
                           value="<?= $row['name']; ?>"><br/>
                    <label for="property-description">Description: </label><br/>
                    <textarea required name="property_description" id="property-description" cols="30"
                              rows="10"><?= $row['description']; ?></textarea><br/>
                    <label>Video: </label><br/>
                    <input accept=".mp4"  type="file" name="property_video" id="property-video">
                    <label>Picture: </label><br/>
                    <input type="file" accept=".jpg, .jpeg, .png, .gif"  name="property_picture"
                           id="property-picture" multiple>
                    <label for="cost">Cost: </label><br/><input required type="text" name="cost" id="cost"
                                                                value="<?= $row['cost']; ?>"><br/>
                    <input type="hidden" name="property_id" value="<?= $_GET['pid']; ?>">
                    <input type="submit" value="Update Property">
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
