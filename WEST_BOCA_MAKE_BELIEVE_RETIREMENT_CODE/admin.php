<!DOCTYPE html>
<html lang="en">
<div class="box box2">
    <head>

        <meta charset="utf-8">
        <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
        <!--  All snippets are MIT license http://bootdey.com/license -->
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
        <br>
        <br>
        <br>
        <div class="menu-container">
            <ul class="vertical-nav">

                <li>
                    <a href="#"><i class="glyphicon glyphicon-cloud" style="font-size:36px;"></i></i></a>
                    <div class="hover-menu">
                        <ul>
                            <li><a href="#">Manage Database</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-envelope" style="font-size:36px;"></i></i></a>
                    <div class="hover-menu">
                        <ul>
                            <li><a href="create-ticket.html#">Inbox</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-home" style="font-size:36px;"></i></i></a>
                    <div class="hover-menu">
                        <ul>
                            <li><a href="create-property.html">Manage Property</a></li>
                            <li><a href="update-property.html">Property Count</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-user" style="font-size:36px;"></i></a>
                    </a>
                    <div class="hover-menu">
                        <ul>
                            <li><a href="profile.html">Manage Users</a></li>
                            <li><a href="register.php">User Count</a></li>
                            <li><a href="#">Authorize Users</a></li>

                    </div>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-expand" style="font-size:36px;"></i></a>
                    <div class="hover-menu">
                        <ul>
                            <li><a href="minigame.html">MiniGame</a></li>
                        </ul>
                    </div>
                </li>
                <li class="log-out">
                    <a title="Sign out" href="login.html"><span class="glyphicon glyphicon-log-out"
                                                                style="font-size:25px;"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container bootstrap snippets bootdey">
        <h1 style="color: white;" class="text-primary">Admin</h1>

        <div class="row">
            <!-- left column -->
            <div class="box box2">
                <div class="text-center">
                    <img src="fau.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <form action="/action_pageGOESHERE.php"> <!--PHP HERE-->
                        <input type="file" class="form-control">
                        <input type="submit" value="Upload" class="form-control">
                    </form>
                </div>
            </div>

            <!-- edit form column -->
            <div class="box box2">
                <!--<div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a>
                  <i class="fa fa-coffee"></i>
                  This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div>-->
                <h3>Admin information</h3>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label"></label>
                        <div class="col-lg-8">
                            <div class="ui-select">
                                <input class="form-control" type="submit" value="Update">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="content">
        <style type="text/css">
            @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto+Condensed");

            *,
            ::after,
            ::before {
                box-sizing: border-box;
            }

            html,
            body {
                margin: 0;
                padding: 0;
                height: 100vh;
            }

            body {
                webkit-text-size-adjust: 100%;
                font-variant-ligatures: none;
                -webkit-font-variant-ligatures: none;
                text-rendering: optimizeLegibility;
                -moz-osx-font-smoothing: grayscale;
                font-smoothing: antialiased;
                -webkit-font-feature-settings: "kern" on, "liga" on, "calt" on, "onum", "pnum";
                -webkit-font-smoothing: subpixel-antialiased;
                text-shadow: rgba(0, 0, 0, 0.01) 0 0 1px;
                background: rgb(0, 0, 0);
                font-family: "Roboto", sans-serif;
                font-size: 14px;
                margin: 0;
                font-weight: 400;
                padding: 0;
            }


            a {
                color: #04AA6D;
            }

            .avatar {
                width: 200px;
                height: 200px;
            }

            body {
                background-image: url('admin-img.jpg');
                background-size: cover;
                background-repeat: no-repeat;
            }

            .box1 {
                background-color: #000;
                color: #fff;
                opacity: .5;
            }

            .box2 {
                background-color: rgba(0, 0, 0, .5);
                color: #fff;
            }

            .navbar {
                position: fixed;
                width: 100%;
                margin-bottom: 0;
                border-radius: 0;
                top: 0;
            }

            img {
                width: 45px;
                height: auto;
            }

            .text-center {
                text-align: center;
            }

            /* Dropdown Button */
            .dropbtn {
                background-color: #04AA6D;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {
                background-color: #ddd;
            }

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            }

            .vertical-nav {
                position: fixed;
                background: rgb(241, 241, 241);
                box-shadow: 0 0 40px #00000021;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                margin: 0;
                padding: 0;
                height: 40vh;
                width: 70px;
            }

            .vertical-nav li {
                list-style: none;
                display: block;
                width: 100%;
                border-bottom: solid 1px rgb(209, 209, 209);
                text-align: center;
                position: relative;
                flex-grow: 1;
                align-items: stretch;
                display: flex;
            }

            .vertical-nav li:last-child {
                border: none;
            }

            .vertical-nav li a {
                width: 100%;
                display: flex;
                align-items: center;
                flex-flow: column;
                justify-content: center;
                transition: all 0.2s ease;
            }

            .vertical-nav li:hover > a {
                background: rgb(209, 209, 209);
                transition: all 0.2s ease;
            }

            .vertical-nav li:hover > a .feather {
                transform: scale(1.1);
                transition: all 0.2s ease;
            }

            .vertical-nav li:hover > .hover-menu,
            .vertical-nav li:focus-within > .hover-menu {
                visibility: visible;
                opacity: 1;
                -webkit-animation: slide-down 0.2s ease-out;
                -moz-animation: slide-down 0.2s ease-out;
                transition: all 0.5s ease;
                display: block;
            }

            .vertical-nav li .hover-menu {
                background: rgb(104, 104, 104);
                visibility: hidden;
                transition: all 0.5s ease;
                opacity: 0;
                display: none;
                position: absolute;
                left: 70px;
                min-width: 200px;
                margin: 0;
                padding: 0;
                top: 0;
                box-shadow: 0 0 40px rgb(104, 104, 104);
            }

            .vertical-nav li .hover-menu:after {
                right: 100%;
                top: 20%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
                border-color: rgba(255, 255, 255, 0);
                border-right-color: rgb(104, 104, 104);
                border-width: 10px;
                margin-top: -10px;
            }

            .vertical-nav li .hover-menu ul {
                margin: 0;
                padding: 0;
            }

            .vertical-nav li .hover-menu ul li {
                list-style: none;
                display: block;
                width: 100%;
                text-align: center;
            }

            .vertical-nav li .hover-menu ul li a {
                width: 100%;
                display: block !important;
                text-decoration: none;
                padding: 15px 20px;
                text-align: left;
                height: auto !important;
                font-weight: 400;
            }

            .vertical-nav li .hover-menu ul li a:hover {
                background: rgb(104, 104, 104);
                transition: 0.3s ease;
            }

            .menu-header {
                font-family: "Roboto Condensed", sans-serif;
                color: #929292;
                font-size: 13px;
                text-align: left !important;
                padding: 12px 20px 5px 20px;
                font-weight: 600;
                border-bottom: none !important;
            }

            .log-out a {
                background: #04AA6D;
                color: white;
            }

            .log-out a:hover {
                color: #04AA6D;
                background: white;
            }

            @-moz-keyframes slide-down {
                0% {
                    opacity: 0;
                    -moz-transform: translateY(-5%);
                }
                100% {
                    opacity: 1;
                    -moz-transform: translateY(0);
                }
            }
        </style>
        <script>
            // Feather Icons
            feather.replace()</script>
        <footer class="container-fluid text-center">
            <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
        </footer>

    </body>
</html>
