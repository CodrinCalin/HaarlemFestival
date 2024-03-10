<?php
include __DIR__ . '/../header.php';
?>

<head>
    <title>Yummy!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/css/managestyle.css" rel="stylesheet">
    <style>
        .max {
            max-width: 50%;
        }
    </style>
</head>

<body>

<div class="container-fluid center mt-3">
    <h1 class="">Manage Categories</h1>
    <a class="btn btn-success ms-5 py-3" href="/managerestaurants/createCategory">Create New Category</a>
</div>
<div class="container-fluid mt-3 max">
    <table class="table table-striped-rows">
        <thead>
        <tr>
            <th>Category Name</th>
            <th>Sorting Order</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($categoryModel as $category) { ?>
             <tr>
             <td><?php echo $category->category ?></td>
             <td><?php echo $category->order ?></td>
             <td><a href='/managerestaurants/editCategory?id=<?php echo $category->id ?>'>Edit</a>
              |
             <a href='/managerestaurants/deleteCategoryById?id=<?php echo $category->id ?>' onclick="return confirm('Are you sure?')">Delete</a>
             </td>
             </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>

<?php
include __DIR__ . '/../footer.php';
?>
