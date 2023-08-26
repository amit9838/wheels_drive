<?php include 'components/header.php' ?>
<?php include 'components/navbar.php' ?>
<?php include 'components/vehicle_functions.php' ?>


<!-- Body items -->
<div class="container mt-5" style="min-width:24rem; overflow-X:scroll;">
    <div class="header_bar d-flex justify-content-between align-items-center my-2">
        <h2>Vehicles</h2>
        <a href="register_vehicle.php" class="btn btn-primary">
            + Add Vehicle
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Brand</th>
                <th scope="col">Class</th>
                <th scope="col">Location</th>
                <th scope="col" class="text-center">Sitting Capicity</th>
                <th scope="col" class="text-center">Rent Per Day</th>
                <th scope="col"  width = '120' class="text-center">Available</th>
                <th scope="col" width = '100'></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cars = get_vehicles();
                for($i=0;$i<count($cars);$i++){
                    ?>
                <tr>
                    <td><?php echo ucfirst($cars[$i]['brand'])." - ".ucfirst($cars[$i]['model']) ?></td>
                    <td><?php echo ucfirst($cars[$i]['class']) ?></td>
                    <td><?php echo ucfirst($cars[$i]['location']) ?></td>
                    <td class="text-center"><?php echo ucfirst($cars[$i]['sitting_capacity']) ?></td>
                    <td class="text-center"><?php echo ucfirst($cars[$i]['rent_per_day']) ?></td>
                    <td class="text-center"><?php echo $cars[$i]['is_on_rent']? '<i class="bi bi-x-lg text-danger"></i>':"<i class='bi bi-check-lg text-success'></i>" ?></td>
                    <td>
                        <a href="<?php echo "view_car.php?vehicle_id=" . $cars[$i]['car_id']?>" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                <?php
            }
            
            ?>
            <!-- Add more rows for additional car listings -->
        </tbody>
    </table>
</div>

<?php include 'components/footer.php' ?>