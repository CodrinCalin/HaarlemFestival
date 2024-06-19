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
        foreach ($model as $user) { ?>
            <tr>
                <td><?php echo isset($user->username) ? $user->username : "" ; ?></td>
                <td><?php echo isset($user->email) ? $user->email : "" ; ?></td>
                <td><?php echo isset($user->password) ? $user->password : "" ; ?></td>
                <td><?php echo isset($user->first_name) ? $user->first_name : "" ; ?></td>
                <td><?php echo isset($user->last_name) ? $user->last_name : "" ; ?></td>
                <td><?php echo isset($user->date_created) ? $user->date_created : "" ; ?></td>
                <td>
                    <a href='/manageusers/edit?id=<?php echo $user->id;?>'>Edit</a>
                    |
                    <a href='/manageusers/delete?id=<?php echo $user->id;?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else{ ?>
        <h3>No users present in the database!</h3>
    <?php } ?>
<?php
include __DIR__ . '/../footer.php';
?>