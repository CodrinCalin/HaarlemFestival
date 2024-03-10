<?php
include __DIR__ . '/../header.php';
?>

<head>
    <title>Yummy!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/css/managestyle.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid center align-items-center flex-column mt-3 pt-2">
    <div class="w-50 box">
        <h1 class="col">Edit Category <span class="fw-bold text-info"><?php echo $categoryModel->category ?></span></h1>
        <p><span class="text-danger">*</span> - fields are required to fill.</p>
        <form action="updateCategory" method="post" class="pb-3 box row">
            <input type="hidden" name="id" id="id" value="<?php echo $categoryModel->id ?>">
            <div class="mb-3 me-5 w-50 col-3">
                <label for="categoryName" class="form-label" aria-describedby="category">Category Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Name of the Category" value="<?php echo $categoryModel->category ?>" maxlength="20" required>
                <div id="category" class="form-text text-white">Max 20 chars.</div>
            </div>
            <div class="mb-3 me-5 col-3">
                <label for="order" class="form-label" aria-describedby="category">Sorting Order<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="order" name="order" placeholder="1" value="<?php echo $categoryModel->order; ?>" max="99" min="0" required>
                <div id="category" class="form-text text-white">Order in which categories appears, lower numbers first.</div>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>


</body>

<?php
include __DIR__ . '/../footer.php';
?>
