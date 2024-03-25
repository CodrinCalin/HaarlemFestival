<?php
include __DIR__ . '/../header.php';
?>

<link href="/css/managestyle.css" rel="stylesheet">

<div class="container-fluid center align-items-center flex-column mt-3 pt-2">
    <div class="w-50 box">
        <h1 class="col">Edit Yummy Details</h1>
        <p><span class="text-danger">*</span> - fields are required to fill.</p>
        <form action="updateYummyDetails" method="post" class="pb-3 box row">
            <div class="row p-0">
                <div class="mb-3 me-5 w-50 col-3">
                    <label for="date" class="form-label" aria-describedby="date">Date<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $yummyModel->date ?>" maxlength="25" required>
                    <div id="date" class="form-text text-white">Max 25 chars.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 me-5">
                    <label for="description" class="form-label" aria-describedby="description">Description<span class="text-danger">*</span></label>
                    <textarea style="height: 150px;" class="form-control" id="description" name="description" placeholder="Description" required><?php echo $yummyModel->description; ?></textarea>
                    <div id="description" class="form-text text-white">Yummy description</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 me-5">
                    <label for="reminder" class="form-label" aria-describedby="reminder">Yummy Reminder<span class="text-danger">*</span></label>
                    <textarea style="height: 75px;" class="form-control" id="reminder" name="reminder" placeholder="Reminder" required><?php echo $yummyModel->reminder; ?></textarea>
                    <div id="reminder" class="form-text text-white">Yummy reminder text</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Yummy Details</button>
        </form>
    </div>
</div>
