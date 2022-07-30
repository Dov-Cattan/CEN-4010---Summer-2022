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
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="create-property.php">Create Property</a></li>
                <?php endif; ?>
                <li><a href="create-ticket.php">Contact IT</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="authorize-users.php">Authorize Users</a></li>
                    <li><a href="minigame.php">Play Minigame</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['role'] == "admin") : ?>
                    <li><a href="admin.php">Admin Panel</a></li>
                <?php endif; ?>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['user'])) : ?>
                    <div class="dropdown">
                        <?php
                        $avatar = $_SESSION['user']['uid'] ? "HTTP://" . $_SERVER['HTTP_HOST'] . '/' . $_SESSION['user']['profile_image'] : "https://bootdey.com/img/Content/avatar/avatar7.png";
                        ?>
                        <img
                                src="<?= $avatar; ?>"
                                class="rounded-circle"
                                height="22"
                                alt=""
                                loading="lazy"
                        />
                        <button class="dropbtn">Profile</button>
                        <div class="dropdown-content">
                            <a href="update-profile.php">Edit Profile</a>
                            <a href="login.php?logout=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                        </div>
                    </div>
                <?php else : ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                <?php endif; ?>
                <?php include_once('session.php'); ?>
                <?php include_once('navigation.php'); ?>
            </div>
        </div>
    </div>
</nav>