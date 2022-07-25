<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><img src="thecanetanklogo.png" class="img-responsive" style="width:50px;height:50px" alt="Image">
                </li>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="update-profile.html">Update Profile</a></li>
                <li><a href="create-property.php">Create Property</a></li>
                <!--            We dont need this, each property in the home page will have an edit button and thats how you get to this page.-->
                <!--        <li><a href="update-property.html">Update Property</a></li> -->
                <li><a href="minigame.html">Play Minigame</a></li>
                <li><a href="create-ticket.html">Contact IT</a></li>
                <li><a href="#">Authorize Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['uid'])) : ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php else : ?>
                    <li><a href="login.php?logout=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>