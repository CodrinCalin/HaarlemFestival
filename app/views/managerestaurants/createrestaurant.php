<?php
include __DIR__ . '/../header.php';
?>

<link href="/css/managestyle.css" rel="stylesheet">

<div class="container-fluid center align-items-center flex-column mt-3 pt-2">
    <div class="w-50 box mb-5">
        <h1>Create Restaurant</h1>
        <p><span class="text-danger">*</span> - fields are required to fill.</p>
        <form action="createRestaurant" method="post" class="pb-3 box row">
            <div class="row p-0 align-self-center">
                <div class="mb-3 col-6">
                    <label for="restaurantName" class="form-label" aria-describedby="restaurant">Restaurant Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="restaurantName" name="restaurant" placeholder="Name of the Restaurant" maxlength="50" pattern="([^\s][A-z0-9À-ž\s]+)" required>
                    <div id="restaurant" class="form-text text-white">Max 50 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="category" class="form-label" aria-describedby="category">Restaurant Category<span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="From The Sea">From The Sea</option>
                    </select>
                </div>
                <div class="mb-3 col-2">
                    <label for="rating" class="form-label" aria-describedby="rating">Rating<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="rating" name="rating" placeholder="1" min="1" max="5" required>
                    <div id="rating" class="form-text text-white">1-5 rating.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-4">
                    <label for="tags1" class="form-label" aria-describedby="tags">Tag #1<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags1" name="tags" placeholder="Tag" maxlength="20" required>
                    <div id="tags" class="form-text text-white">Max 20 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="tags2" class="form-label" aria-describedby="tags">Tag #2<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags2" name="tags" placeholder="Tag" maxlength="20" required>
                    <div id="tags" class="form-text text-white">Max 20 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="tags3" class="form-label" aria-describedby="tags">Tag #3<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags3" name="tags" placeholder="Tag" maxlength="20" required>
                    <div id="tags" class="form-text text-white">Max 20 chars.</div>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-8">
                    <label for="address" class="form-label" aria-describedby="address">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" maxlength="100" pattern="([^\s][A-z0-9À-ž\s]+)" required>
                    <div id="address" class="form-text text-white">Max 100 chars.</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="number" class="form-label" aria-describedby="number">Phone Number<span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="address" name="number" placeholder="Phone Number" pattern="^.+$" required>
                </div>
            </div>
            <div class="row p-0">
                <div class="mb-3 col-6">
                    <label for="menuLink" class="form-label" aria-describedby="menuLink">Link to Menu<span class="text-danger">*</span></label>
                    <input type="url" class="form-control" id="menuLink" name="menuLink" placeholder="https://yourwebsite.com" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="adultPrice" class="form-label" aria-describedby="adultPrice">Adult Price<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="adultPrice" name="adultPrice" placeholder="10,00" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="childPrice" class="form-label" aria-describedby="childPrice">Child Price<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="childPrice" name="childPrice" placeholder="10,00" required>
                </div>
            </div>
            <div class="row p-0">
            <button type="submit" class="btn btn-primary">Add Restaurant</button>
            </div>
        </form>
    </div>
</div>
</body>
