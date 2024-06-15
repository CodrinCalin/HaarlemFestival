<?php
include __DIR__ . '/../header.php';
?>

<link href="/css/managestyle.css" rel="stylesheet">

<div class="container-fluid center align-items-center flex-column mt-3 pt-2">
    <div class="w-50 box">
        <h1>Create Category</h1>
        <p><span class="text-danger">*</span> - fields are required to fill.</p>
        <form action="createCategory" method="post" class="pb-3 box row">
            <div class="mb-3 me-5 w-50 col-3">
                <label for="categoryName" class="form-label" aria-describedby="category">Category Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="categoryName" name="category" placeholder="Name of the Category" maxlength="20" required>
                <div id="category" class="form-text text-white">Max 20 chars.</div>
            </div>
            <div class="mb-3 me-5 col-3">
                <label for="order" class="form-label" aria-describedby="category">Sorting Order<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="order" name="order" placeholder="1" max="99" min="0" required>
                <div id="category" class="form-text text-white">Order in which categories appear, lower numbers first.</div>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
