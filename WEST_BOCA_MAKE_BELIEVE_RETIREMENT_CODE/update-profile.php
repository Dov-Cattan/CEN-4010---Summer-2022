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
    <style type="text/css">
        .avatar {
            width: 100px;
            height: 100px;
        }

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
<?php include_once('session.php'); ?>
<?php include_once('navigation.php'); ?>

<div class="container box box2 bootstrap snippets bootdey">
    <h1 style="color: white;" class="text-primary">Update Profile</h1>
    <hr>
    <div class="row">
        <!-- edit form column -->
        <!--<div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>-->
        <h3 style="text-align: center">Personal info</h3>
        <?php
        global $mysqli;

        if (isset($_GET['success'])) {
            echo '<p style="color: green; text-align: center">Profile successfully created.</p>';
        }

        $target_dir = dirname(__FILE__);
        $target_file = $target_dir . '/' . basename($_FILES["profile_image"]["name"]);
        if (isset($_POST['name'])) {
            $target_dir = dirname(__FILE__);
            $target_file = $target_dir . '/' . basename($_FILES["profile_image"]["name"]);
            move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
            $sql = <<<EOD
                UPDATE users SET name='{$_POST['name']}', email='{$_POST['email']}', 
                password='{$_POST['password']}', last_name='{$_POST['last_name']}', profile_image='{$_FILES["profile_image"]["name"]}' 
                WHERE uid = {$_SESSION['user']['uid']};                
EOD;
            $update = $mysqli->query($sql);
            if (!$update) {
                echo '<p style="color: red">Sorry, there was an error inserting your profile.</p>';
            } else {
                echo '<p style="color: green; text-align: center">Profile successfully updated.</p>';
            }
        }


        $result = $mysqli->query("SELECT * FROM users WHERE uid = {$_SESSION['user']['uid']}");
        $row = $result->fetch_array();
        $avatar = $row['profile_image'] ? $_SERVER['HTTP_HOST'] . '/' . $row['profile_image'] : "https://bootdey.com/img/Content/avatar/avatar7.png";
        ?>
        <form method="post" action="" class="form-horizontal" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label">
                    <img  src="http://<?= $avatar; ?>"
                         class="avatar img-circle img-thumbnail" alt="avatar"></label>
                <div class="col-lg-8">
                    <input style="margin-top: 60px" type="file" name="profile_image">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="name" type="text" value="<?= $row['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="last_name" type="text" value="<?= $row['last_name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-8">
                    <p>Must be 8 Characters long, including a number and a symbol.</p>
                    <input required class="form-control" name="password" type="password" value="<?= $row['password']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input required class="form-control" name="email" type="text" value="<?= $row['email']; ?>">
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
    </div>
</div>
<footer class="container box box2 text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>
</body>
</html>