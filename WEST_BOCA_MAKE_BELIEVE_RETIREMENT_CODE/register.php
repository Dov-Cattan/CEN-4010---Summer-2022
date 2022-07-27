<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('retirement-home.jpg');
            background-repeat: no-repeat;
        }

        .box1 {
            background-color: #000;
            color: #fff;
            opacity: .5;
        }

        .box2 {
            padding: 10px;
            background-color: rgba(0, 0, 0, .5);
            color: #fff;
        }

        img {
            width: 45px;
            height: auto;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include_once('session.php');
global $mysqli;
if (isset($_POST['name'])) {
    $target_dir = dirname(__FILE__);
    $target_file = $target_dir . '/' . basename($_FILES["profile_image"]["name"]);
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        $sql = <<<EOD
                INSERT INTO users (name, email, password, last_name, profile_image) 
                VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['password']}', '{$_POST['email']}', '{$_FILES["profile_image"]["name"]}');
EOD;

        $result = $mysqli->query($sql);
        if ($result) {
            $uid = $mysqli->insert_id;
            $user = $mysqli->query("SELECT * FROM users WHERE uid = {$uid}")->fetch_array(MYSQLI_ASSOC);
            $_SESSION['user'] = $user;
            header('Location: update-profile.php?success=1');
            exit;
        }
    } else {
        echo "<p style='text-align: center' class='error'>Sorry, there was an error uploading the files</p>";
    }
}
?>
<?php include_once('navigation.php'); ?>
<div class="container box box2 bootstrap snippets bootdey">
    <h1 style="color: white;" class="text-primary">Create Profile</h1>
    <hr>
    <div class="row">
        <!-- edit form column -->
        <!--<div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>-->
        <h3 style="text-align: center">Personal info</h3>

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label">
                    <img  src="https://bootdey.com/img/Content/avatar/avatar7.png"
                         class="avatar img-circle img-thumbnail" alt="avatar"></label>
                <div class="col-lg-8">
                    <input required style="margin-top: 60px" type="file" name="profile_image">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="name" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="last_name" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="password" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="email" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"></label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <input class="form-control" type="submit" value="Submit">
                        <hr>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($result) && !$result) {
            echo "<p style='text-align: center' class='error'>Sorry, there was an error creating your profile.</p>";
        }
        ?>
    </div>
</div>
<footer class="container box box2 text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>
</body>
</html>