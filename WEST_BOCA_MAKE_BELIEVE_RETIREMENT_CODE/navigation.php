<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">The Cane Tank</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><img src="thecanetanklogo.png" class="img-responsive" style="width:50px;height:50px" alt="Image">
                </li>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="update-profile.php">Update Profile</a></li>
                <li><a href="create-property.php">Create Property</a></li>
                <li><a href="minigame.php">Play Minigame</a></li>
                <li><a href="create-ticket.php">Contact IT</a></li>
                <li><a href="#">Authorize Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['uid'])) : ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php else : ?>
                    <li><a href="login.php?logout=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </li>
                <?php endif; ?>
                <?php include_once('session.php'); ?>
<?php include_once('navigation.php'); ?>
            </ul>
        </div>
    </div>
</nav>