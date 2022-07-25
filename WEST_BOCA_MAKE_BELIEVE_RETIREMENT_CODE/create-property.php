<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Property</title>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
        <div class="sub-container">
            <h1>Add Property</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <label for="property-name">Name: </label><br/>
                <input required type="text" name="property_name" id="property-name"><br/>
                <label for="property-description">Description: </label><br/>
                <textarea required name="property_description" id="property-description" cols="30" rows="10"></textarea><br/>
                <label>Video: </label><br/><input accept=".mp4" required type="file" name="property_video"
                                                  id="property-video">
                <label>Pictures: </label><br/><input type="file" accept=".jpg, .jpeg, .png, .gif" required
                                                     name="property_picture" id="property-picture"
                                                     multiple>
                <label for="cost">Cost: </label><br/><input required type="text" name="cost" id="cost"><br/>
                <input type="submit" value="Submit Property">
            </form>
            <?php
            if (isset($_POST['property_name'])) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/';
                $target_file = $target_dir . basename($_FILES["property_picture"]["name"]);
                $target_video = $target_dir . basename($_FILES["property_video"]["name"]);
                if (move_uploaded_file($_FILES["property_picture"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["property_video"]["tmp_name"], $target_video)) {
                    $sql = "INSERT INTO properties (name, description, video, picture, cost, uid) VALUES ('{$_POST['property_name']}', '{$_POST['property_description']}', '$target_video', '$target_file', '{$_POST['cost']}', '{$_SESSION['uid']}')";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        echo '<p style="color: red">Sorry, there was an error inserting your property.</p>';
                    } else {
                        echo '<p style="color: green">Property successfully created.</p>';
                    }
                } else {
                    echo "Sorry, there was an error inserting your property.";
                }
            }
            ?>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
