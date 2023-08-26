<?php include 'vehicle_functions.php' ?>
<?php include 'constants.php' ?>



<div class="container my-3">
    <div class="row">

        <?php
        $cars = get_vehicles();
        for ($i = 0; $i < count($cars); $i++) {
            if (!$cars[$i]['is_on_rent']) {

                ?>

                <div class="col-md-4">
                    <div class="card car-card">
                        <!-- <img src="car-image.jpg" class="card-img-top" alt="Car Image"> -->
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo ucfirst($cars[$i]['brand']) . " - " . ucfirst($cars[$i]['model']) ?>
                            </h5>
                            <h5>
                                <i class="bi bi-geo-alt"></i>
                                <?php echo ucfirst($cars[$i]['location']) ?>
                            </h5>
                            <p class="card-text">
                                <?php echo ucfirst($cars[$i]['specs']) ?>
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Class:
                                    <?php echo ucfirst($cars[$i]['class']) ?>
                                </li>
                                <li class="list-group-item">
                                    Sitting Capacity:
                                    <?php echo ucfirst($cars[$i]['sitting_capacity']) ?>
                                </li>
                                <li class="list-group-item">
                                    Fuel Economy:
                                    <?php echo ucfirst($cars[$i]['fuel_economy']) ?>Km/L
                                </li>
                            </ul>

                            <?php
                            $str_arr = explode(",", $cars[$i]['tags']);
                            foreach ($str_arr as $key => $value) {
                                ?>
                                <span class="badge rounded-pill border text-dark">
                                    <?php echo $value ?>
                                </span>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <span class="text-dark border px-3 py-2 bg-light rounded">
                                Rs.
                                <?php echo ucfirst($cars[$i]['rent_per_day']) ?>/Day
                            </span>
                            <?php

                            $is_session = isset($_SESSION['role']);
                            $role = null;
                            if ($is_session) {
                                $role = $_SESSION['role'];
                            }
                            if ($role != "admin") {
                                ?>
                                <a href="<?php echo $is_session ? "rent_now.php?vehicle_id=" . $cars[$i]['car_id'] : 'login.php' ?>"
                                    class="btn btn-primary btn-rent my-2">Rent
                                    Now</a>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }

        ?>

    </div>
</div>