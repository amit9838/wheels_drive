<?php include 'components/header.php' ?>
<?php include 'components/navbar.php' ?>
<?php include 'components/vehicle_functions.php' ?>

<?php
if (isset($_GET)) {
    $vehicle_id = $_GET['vehicle_id'];
}
update_vehicle($vehicle_id);
?>


<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Register New Car</h2>
            <form action="" method="post">
                <div class="row">
                    <!-- First Column -->
                    <div class="col-md-6">
                        <?php
                        $car = get_vehicle($vehicle_id);
                        ?>
                        <div class="form-group mb-3">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" value = "<?php echo $car['brand'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value = "<?php echo $car['model'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" id="class" name="class" value = "<?php echo $car['class'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="vehicle_no">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" value = "<?php echo $car['vehicle_no'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value = "<?php echo $car['location'] ?>">
                        </div>
                    </div>

                    <!-- Second Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sitting_capacity">Sitting Capacity</label>
                            <input type="text" class="form-control" id="sitting_capacity" name="sitting_capacity"
                            value = "<?php echo $car['sitting_capacity'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fuel_economy">Fuel Economy</label>
                            <input type="text" class="form-control" id="fuel_economy" name="fuel_economy" value = "<?php echo $car['fuel_economy'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="specs">Specs</label>
                            <textarea class="form-control" id="specs" name="specs" rows="3"  ><?php echo $car['specs'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tags">Tags</label>
                            <textarea class="form-control" id="tags" name="tags" rows="1" ><?php echo $car['tags'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rent_per_day">Rent per Day</label>
                            <input type="text" class="form-control" id="rent_per_day" name="rent_per_day" value = "<?php echo $car['rent_per_day'] ?>" required>
                        </div>
                    </div>
                </div>
                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="Save">
            </form>
        </div>
    </div>
</div>
<?php include 'components/footer.php' ?>