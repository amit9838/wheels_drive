<?php include 'components/db.php' ?>

<?php   
    if (isset($_GET)) {
        global $connection;
        $vehicle_id = $_GET['vehicle_id'];
         
        $query = "DELETE FROM cars ";
        $query .= "WHERE car_id = $vehicle_id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }
        echo "car deleted";

        header("Location: /wheels_drive/");
    }

?>