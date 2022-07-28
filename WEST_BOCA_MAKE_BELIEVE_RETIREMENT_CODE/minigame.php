<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Cane Tank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
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

        .main-container {
            background-color: #aaa8a8;
            height: 750px;
            width: 420px;
            margin: 0 auto;
        }

        .board {
            height: 420px;
            width: 420px;
            margin: 10px auto;
        }

        h1 {
            color: greenyellow;
            text-align: center;
        }

        .cell {

            width: 140px;
            height: 140px;
            border: 10px solid rgb(0, 0, 0);
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            cursor: pointer;
            float: left;
            line-height: 180px;
            text-align: center;
            font-family: "Courier, monospace";
            font-weight: bold;
            font-size: 70px;

        }

        .control {
            font-family: "Courier, monospace";
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin-top: 40px;
        }

        .level {
            margin: 0 15px;
            color: rgb(117, 65, 230);
            cursor: pointer;
        }

        .not-selected {
            opacity: 0.5;
        }

        .not-selected:hover {
            opacity: 1;
        }

        .start {
            font-family: "Courier, monospace";
            margin-top: 20px;
            width: 100px;
            height: 100px;

            line-height: 100px;
            text-align: center;


            color: rgb(243, 255, 7);
            margin-left: auto;
            margin-right: auto;
            cursor: pointer;
            opacity: 0.5;
        }

        .start:hover {
            opacity: 1;
        }

        .ingame {
            display: none;
            color: rgb(255, 255, 255);
        }

        .ingame > p {
            margin: 0px;
        }
    </style>
    <style>

        body {
            background-color: #aaa8a8;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script type="text/javascript">
        function refreshPage() {

            location.reload();

        }

    </script>
</head>
<body>
<?php include_once('session.php'); ?>
<?php include_once('navigation.php'); ?>

<div class="jumbotron">
    <div class="container text-center">
        <h1>The Cane Tank</h1>
        <p> This is a tank where you can place all of your property including your supplies
        </p>
    </div>
</div>


</h1>

<div class='main-container'>

    <div class='board'>
        <!-- data-indx following cell divs represents cell index in 1D array representation -->
        <div class='cell' data-indx="0"></div>
        <div class='cell' data-indx="1"></div>
        <div class='cell' data-indx="2"></div>
        <div class='cell' data-indx="3"></div>
        <div class='cell' data-indx="4"></div>
        <div class='cell' data-indx="5"></div>
        <div class='cell' data-indx="6"></div>
        <div class='cell' data-indx="7"></div>
        <div class='cell' data-indx="8"></div>
    </div>

    <div class='control'>
        <!-- div.intial displays the starting controls -->
        <div class='intial'>
            <div class='difficulty'>
                <span class='level not-selected' id="Easy">Easy</span>
                <span class='level not-selected' id="Medium">Medium</span>
                <span class='level not-selected' id="Hard">Hard</span>
            </div>

            <div class='start'> Start</div>
        </div>

        <!-- div.ingame displays in-game messages and controls -->
        <div class='ingame' id="human">It's your turn ...</div>
        <div class='ingame' id="ai"></div>
        <div class='ingame' id="won">You won !</div>
        <div class='ingame' id="lost">You lost !</div>
        <div class='ingame' id="draw">It's a Draw</div>
        <p><input type="button"
                  style="height: 50px; width: 275px;margin-bottom: 15px;color:white;background-color: orangered;"
                  value="PLAY AGAIN" onclick='refreshPage()'/>
    </div>
</div>

<script src="minigame_scripts/jquery-1.10.1.min.js"></script>
<script src="minigame_scripts/ui.js"></script>
<script src="minigame_scripts/game.js"></script>
<script src="minigame_scripts/ai.js"></script>
<script src="minigame_scripts/control.js"></script>

<footer class="container-fluid text-center">
    <p>Made By Dov Cattan, Justin Sison, Serwin Kastaneer, Eric Palomino, and Juan Lopez Restrepo</p>
</footer>

</body>
</html>
