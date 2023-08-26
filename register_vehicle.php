<?php include 'components/header.php' ?>
<?php include 'components/navbar.php' ?>
<?php include 'components/vehicle_functions.php' ?>

<?php 
    register_vehicle();
?>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Register New Car</h2>
            <form action="register_vehicle.php" method="post">
                <div class="row">
                    <!-- First Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" id="class" name="class" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="vehicle_no">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" >
                        </div>
                    </div>
                    
                    <!-- Second Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sitting_capacity">Sitting Capacity</label>
                            <input type="text" class="form-control" id="sitting_capacity" name="sitting_capacity" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fuel_economy">Fuel Economy</label>
                            <input type="text" class="form-control" id="fuel_economy" name="fuel_economy" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="specs">Specs</label>
                            <textarea class="form-control" id="specs" name="specs" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tags">Tags</label>
                            <textarea class="form-control" id="tags" name="tags" rows="1"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rent_per_day">Rent per Day</label>
                            <input type="text" class="form-control" id="rent_per_day" name="rent_per_day" required>
                        </div>
                    </div>
                </div>
                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="Register Vehicle">
            </form>
        </div>
    </div>
</div>
<?php include 'components/footer.php' ?>