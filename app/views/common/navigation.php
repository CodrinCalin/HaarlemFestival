<header class="bg-secondary">
    <div id="topNav" class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="/">
                <img class="d-inline-block align-top logo"
                     src="\img\logo\logoFullLight.png" alt="Logo Image">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'bold-nav-link' : ''; ?>">
                    <a href="/" class="nav-link">Home</a></li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/history') ? 'bold-nav-link' : ''; ?>">
                    <a href="/history" class="nav-link">History</a></li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/restaurant') ? 'bold-nav-link' : ''; ?>">
                    <a href="/restaurant" class="nav-link">Yummy!</a></li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/dance') ? 'bold-nav-link' : ''; ?>">
                    <a href="/dance" class="nav-link">Dance!</a></li>
                <li class="nav-item">
                    <a href="/personalprogram" class="nav-link">
                        <img class="d-inline-block align-top nav_icon"
                             src="\img\icons\shoppingCart.png" alt="Personal Program">
                    </a>
                </li>
                <?php
                if(isset($_SESSION["authUser"])) { ?>
                    <?php
                    $authUser = $_SESSION["authUser"];
                    if($authUser->permissions < 2) { ?>
                        <li class="nav-item dropdown <?php echo ($_SERVER['REQUEST_URI'] == '/manage') ? 'bold-nav-link' : ''; ?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Management
                            </a>
                            <div id="dropdownManagement" class="dropdown-menu dropdown-menu-end"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/manageusers">Manage Users</a>
                                <a class="dropdown-item" href="/managetickets">Manage Tickets</a>
                                <a class="dropdown-item" href="/managehistory">Manage History</a>
                                <a class="dropdown-item" href="/managerestaurants">Manage Restaurants</a>

                            </div>
                        </li>
                    <?php }?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="\img\userAvatar\default.png" alt="User Avatar"
                                 class="d-inline-block align-top avatarIcon">
                            <?php /*{ $authUser->username; }*/ ?>
                        </a>
                        <div id="dropdownUser" class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/user/settings">Settings</a>
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </div>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/auth') ? 'bold-nav-link' : ''; ?>"><a href="/auth" class="nav-link">Sign in</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>