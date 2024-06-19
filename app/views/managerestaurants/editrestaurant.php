<?php
include __DIR__ . '/../header.php';
?>

<link href="/css/managestyle.css" rel="stylesheet">

<div class="container-fluid center align-items-center flex-column mt-3 pt-2">
    <div class="w-50 box mb-5">
        <h1>Edit Restaurant <span class="fw-bold text-info"><?php echo $restaurantModel->name ?></span></h1>
        <p><span class="text-danger">*</span> - fields are required to fill.</p>
        <form action="updateRestaurant" method="post" enctype="multipart/form-data" class="pb-3 box row">
            <input type="hidden" name="id" id="id" value="<?php echo $restaurantModel->id ?>">
            <div class="row p-0 align-self-center">
                <div class="mb-3 col-6">
                    <label for="restaurantName" class="form-label" aria-describedby="restaurant">Restaurant Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="restaurantName" name="restaurant" placeholder="Name of the Restaurant" value="<?php echo $restaurantModel->name ?>" maxlength="50" required>
                    <div id="restaurant" class="form-text text-white">Max 50 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="category" class="form-label" aria-describedby="category">Restaurant Category<span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category" required>
<!--                        //Display the restaurants category first in the list in the ugliest way possible-->
                        <?php foreach($categoryModel as $category) { if($category->category == $restaurantModel->restaurantCategory) { ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->category ?></option> <?php } } ?>
                        <?php foreach($categoryModel as $category) { if($category->category != $restaurantModel->restaurantCategory) { ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->category ?></option> <?php } } ?>
                    </select>
                </div>
                <div class="mb-3 col-2">
                    <label for="rating" class="form-label" aria-describedby="rating">Rating<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="rating" name="rating" placeholder="1" value="<?php echo $restaurantModel->rating ?>" min="1" max="5" required>
                    <div id="rating" class="form-text text-white">1-5 rating.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-4">
                    <label for="tags1" class="form-label" aria-describedby="tags1">Tag #1<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags1" name="tags1" placeholder="Tag" value="<?php echo $tagArray[0] ?>" maxlength="20" required>
                    <div id="tags1" class="form-text text-white">Max 20 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="tags2" class="form-label" aria-describedby="tags2">Tag #2<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags2" name="tags2" placeholder="Tag" value="<?php echo $tagArray[1] ?>" maxlength="20" required>
                    <div id="tags2" class="form-text text-white">Max 20 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="tags3" class="form-label" aria-describedby="tags3">Tag #3<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags3" name="tags3" placeholder="Tag" value="<?php echo $tagArray[2] ?>" maxlength="20" required>
                    <div id="tags3" class="form-text text-white">Max 20 chars.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-8">
                    <label for="address" class="form-label" aria-describedby="address">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $restaurantModel->address ?>" maxlength="100" required>
                    <div id="address" class="form-text text-white">Max 100 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="number" class="form-label" aria-describedby="number">Phone Number<span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="address" name="number" placeholder="Phone Number" value="<?php echo $restaurantModel->phoneNumber ?>" pattern="^.+$" required>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-6">
                    <label for="menuLink" class="form-label" aria-describedby="menuLink">Link to Menu<span class="text-danger">*</span></label>
                    <input type="url" class="form-control" id="menuLink" name="menuLink" placeholder="https://yourwebsite.com" value="<?php echo $restaurantModel->menuLink ?>" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="adultPrice" class="form-label" aria-describedby="adultPrice">Adult Price<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="adultPrice" name="adultPrice" placeholder="10.00" value="<?php echo $restaurantModel->adultPrice ?>" pattern="^\d*(\.\d{0,2})?$" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="childPrice" class="form-label" aria-describedby="childPrice">Child Price<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="childPrice" name="childPrice" placeholder="10.00" value="<?php echo $restaurantModel->childPrice ?>" pattern="^\d*(\.\d{0,2})?$" required>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3">
                    <label for="description" class="form-label" aria-describedby="description">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control text-box" id="description" name="description" placeholder="Description" required><?php echo $restaurantModel->description ?></textarea>
                    <div id="description" class="form-text text-white">Description on the front page. (Add &lt;br&gt; for line breaks)</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3">
                    <label for="menuText" class="form-label" aria-describedby="menuText">Menu Text<span class="text-danger">*</span></label>
                    <textarea class="form-control text-box" id="menuText" name="menuText" placeholder="Menu Text" required><?php echo $restaurantModel->menuText ?></textarea>
                    <div id="menuText" class="form-text text-white">Text describing your menu. (Add &lt;br&gt; for line breaks)</div>
                </div>
            </div>
            <div class="row p-0 mt-3 mb-2">
                <h5 class="text-danger text-center">Uploading new images overwrite the current ones, don't upload to keep current.</h5>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-6">
                    <label for="previewImage" class="form-label" aria-describedby="previewImage">Preview Image</label>
                    <input type="file" class="form-control" id="previewImage" name="previewImage" accept="image/jpeg, image/png">
                    <div id="previewImage" class="form-text text-white">Image shown when looking at all restaurant cards.</div>
                </div>
                <div class="mb-3 col-6">
                    <label for="frontPageImage" class="form-label" aria-describedby="frontPageImage">Front Page Image</label>
                    <input type="file" class="form-control" id="frontPageImage" name="frontPageImage" accept="image/jpeg, image/png">
                    <div id="frontPageImage" class="form-text text-white">Image at the front page of your personal page.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-6">
                    <label for="displayImageOne" class="form-label" aria-describedby="displayImageOne">First Display Image</label>
                    <input type="file" class="form-control" id="displayImageOne" name="displayImageOne" accept="image/jpeg, image/png">
                    <div id="displayImageOne" class="form-text text-white">Image shown to the left of your menu text.</div>
                </div>
                <div class="mb-3 col-6">
                    <label for="displayImageTwo" class="form-label" aria-describedby="displayImageTwo">Second Display Image</label>
                    <input type="file" class="form-control" id="displayImageTwo" name="displayImageTwo" accept="image/jpeg, image/png">
                    <div id="displayImageTwo" class="form-text text-white">Image shown to the right of your restaurant information.</div>
                </div>
            </div>
            <div class="row p-0 mt-1">
                <button type="submit" class="btn btn-primary">Update Restaurant</button>
            </div>
        </form>
    </div>
</div>
</body>
