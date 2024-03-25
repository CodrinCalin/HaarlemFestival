<!DOCTYPE html>
<html lang="en">
<head>
    <title>Haarlem Festival</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<style>
    <?php use App\Models\Permissions;
        include __DIR__ . '/../public/css/style.css' ?>
</style>
    <main>
        <div class="bg-secondary">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/history" class="nav-link">History</a></li>
                    <li class="nav-item"><a href="/restaurant" class="nav-link">Yummy!</a></li>
                    <li class="nav-item"><a href="/dance" class="nav-link">Dance!</a></li>
                    <?php
                    if(isset($_SESSION["authUser"])) {
                        $authUser = $_SESSION["authUser"];
                        if($authUser->permissions == 2) { ?>
                            <li class="nav-item"><a href="/manageusers" class="nav-link">Manage Users</a></li>
                            <li class="nav-item"><a href="/managerestaurants" class="nav-link">Manage Restaurants</a></li>
                            <li class="nav-item"><a href="/managehome" class="nav-link">Manage Home</a></li>
                        <?php }?>
                        <li class="nav-item"><a href="/auth/logout" class="nav-link">Log out</a></li>
                    <?php } else{ ?>
                        <li class="nav-item"><a href="/auth" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="/auth/register" class="nav-link">Register</a></li>
                    <?php } ?>
                </ul>
            </header>
        </div>
