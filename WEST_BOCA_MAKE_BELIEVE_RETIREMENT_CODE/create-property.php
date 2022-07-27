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
            <h1>Add Property</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <label for="property-name">Name: </label><br/>
                <input required type="text" name="property_name" id="property-name"><br/>
                <label for="property-description">Description: </label><br/>
                <textarea required name="property_description" id="property-description" cols="30" rows="10"></textarea><br/>
                <label>Video: </label><br/><input accept=".mp4" type="file" name="property_video"
                                                  id="property-video">
                <label>Pictures: </label><br/><input type="file" accept=".jpg, .jpeg, .png, .gif"
                                                     name="property_picture" id="property-picture"
                                                     multiple>
                <label for="cost">Cost: </label><br/><input required type="text" name="cost" id="cost"><br/>
                <input type="submit" value="Submit Property">
            </form>
            <?php
            global $mysqli;
            if (isset($_POST['property_name'])) {
                $error = [];
                $target_dir = dirname(__FILE__);
                $target_file = $target_dir . '/' . basename($_FILES["property_picture"]["name"]);
                $target_video = $target_dir . '/' . basename($_FILES["property_video"]["name"]);
                move_uploaded_file($_FILES["property_picture"]["tmp_name"], $target_file);
                move_uploaded_file($_FILES["property_video"]["tmp_name"], $target_video);

                $sql = "INSERT INTO properties (name, description, video, picture, cost, uid) VALUES ('{$_POST['property_name']}', '{$_POST['property_description']}', '{$_FILES["property_video"]["name"]}', '{$_FILES["property_picture"]["name"]}', '{$_POST['cost']}', '{$_SESSION['user']['uid']}')";
                $result = $mysqli->query($sql);
                if (!$result) {
                    echo "<p style='color: red'>Sorry, there was an error inserting your property. {$mysqli->error}</p>";
                } else {
                    echo '<p style="color: green">Property successfully created.</p>';
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
