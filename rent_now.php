<?php include 'components/header.php' ?>
<?php include 'components/navbar.php' ?>

<?php include 'components/vehicle_functions.php' ?>

<?php
if (isset($_GET)) {
    $vehicle_id = $_GET['vehicle_id'];
}

put_on_rent($vehicle_id);

?>



<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Car Information and Date Selection Card -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php
                    $car = get_vehicle($vehicle_id);
                    ?>
                    <h3 class="my-3 mb-2">
                        <?php echo ucfirst($car['brand']) . " - " . ucfirst($car['model']) ?>
                    </h3>
                    <h5>
                        <i class="bi bi-geo-alt"></i>
                        <?php echo ucfirst($car['location']) ?>
                    </h5>

                    <p class="card-text">
                        <?php echo ucfirst($car['specs']) ?>
                    </p>


                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Class:
                            <?php echo ucfirst($car['class']) ?>
                        </li>
                        <li class="list-group-item">
                            Sitting Capacity:
                            <?php echo ucfirst($car['sitting_capacity']) ?>
                        </li>
                        <li class="list-group-item">
                            Fuel Economy:
                            <?php echo ucfirst($car['fuel_economy']) ?>Km/l
                        </li>
                    </ul>

                    <hr>
                    <?php
                    $str_arr = explode(",", $car['tags']);
                    foreach ($str_arr as $key => $value) {
                        ?>
                        <span class="badge rounded-pill border text-dark">
                            <?php echo $value ?>
                        </span>
                        <?php
                    }

                    ?>


                    <?php
                    if ($car['is_on_rent']) {
                        ?>
                        <h5 class="card-title">Vehicle on rent</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>From</h5>
                                <?php echo $car['rent_start_date'] ?>
                            </div>
                            <div class="col-sm-6">
                                <h5>To</h5>
                                <?php echo $car['rent_end_date'] ?>
                            </div>
                        </div>

                        <?php
                    } else {
                        ?>
                        <h5 class="card-title">Select Dates</h5>

                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rentFrom">Rent From</label>
                                        <input type="date" class="form-control" id="rentFrom" name="rent_from">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rentTo">Rent To</label>
                                        <input type="date" class="form-control" id="rentTo" name="rent_to">
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-sm btn-primary mt-3" type="submit" name="submit" value="Confirm Rent" />
                        </form>
                        <?php
                    }

                    ?>


                    <?php
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php' ?>