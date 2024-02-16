<?php
include __DIR__ . '/../header.php';
?>

    <h1>Manage Users</h1>
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

<?php
include __DIR__ . '/../footer.php';
?>