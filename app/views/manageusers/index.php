<?php
include __DIR__ . '/../header.php';
?>

    <div class="row">
        <h1 class="col-3">Manage Users</h1>
        <div class="col-2">
            <button class="btn btn-success"><a href="/manageusers/create" style="color: white; text-decoration: none;">Create New</a></button>
        </div>
    </div>
    <?php
    if($model){
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Pass</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date Created</th>
            <th>Buttons</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($model as $user) {
            echo "<tr>";
                echo "<td>$user->username</td>";
                echo "<td>$user->email</td>";
                echo "<td>$user->password</td>";
                echo "<td>$user->first_name</td>";
                echo "<td>$user->last_name</td>";
                echo "<td>$user->date_created</td>";
                echo "<td><a href='/manageusers/edit?id=$user->id'>Edit</a>";
                echo " | ";
                echo "<a href='/manageusers/delete?id=$user->id'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <?php }else{ ?>
        <h3>No users present in the database!</h3>
    <?php } ?>

<?php
include __DIR__ . '/../footer.php';
?>