<?php include 'db.php' ?>

<?php


function str2_cleanup($input)
{
    global $connection;
    return mysqli_real_escape_string($connection, $input);
}

function get_vehicles()
{
    global $connection;

    $query = "SELECT * FROM cars";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Querry FAILED " . mysqli_error($connection));
    }

    $cars = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $cars[$i] = $row;
        $i += 1;
    }
    return $cars;
}


function get_vehicle($vehicle_id){
    global $connection;
    $query = "SELECT * FROM cars WHERE car_id = $vehicle_id;";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Querry FAILED " . mysqli_error($connection));
    }

    $vehicle = mysqli_fetch_assoc($result);
    if(!$vehicle){
        header("Location: error_404.php");
    };
    return $vehicle;
}

function register_vehicle()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $class = $_POST['class'];
        $vehicle_no = $_POST['vehicle_no'];
        $sitting_capacity = $_POST['sitting_capacity'];
        $fuel_economy = $_POST['fuel_economy'];
        $specs = $_POST['specs'];
        $rent_per_day = $_POST['rent_per_day'];
        $location = $_POST['location'];
        $tags = $_POST['tags'];

        $brand = str2_cleanup($brand);
        $model = str2_cleanup($model);
        $class = str2_cleanup($class);
        $vehicle_no = str2_cleanup($vehicle_no);
        $sitting_capacity = str2_cleanup($sitting_capacity);
        $fuel_economy = str2_cleanup($fuel_economy);
        $specs = str2_cleanup($specs);
        $rent_per_day = str2_cleanup($rent_per_day);
        $location = str2_cleanup($location);
        $tags = str2_cleanup($tags);

        $query = "INSERT INTO cars(brand,model,class,vehicle_no , sitting_capacity, fuel_economy, specs,rent_per_day,location,tags) ";
        $query .= "VALUES ('$brand','$model','$class','$vehicle_no', '$sitting_capacity', '$fuel_economy', '$specs', '$rent_per_day','$location','$tags')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }
        // echo "Vehicle Registred successfully!";
    }

    // return header("Location: register.php");
}
function update_vehicle($vehicle_id)
{
    global $connection;
    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $class = $_POST['class'];
        $vehicle_no = $_POST['vehicle_no'];
        $sitting_capacity = $_POST['sitting_capacity'];
        $fuel_economy = $_POST['fuel_economy'];
        $specs = $_POST['specs'];
        $rent_per_day = $_POST['rent_per_day'];
        $location = $_POST['location'];
        $tags = $_POST['tags'];

        $brand = str2_cleanup($brand);
        $model = str2_cleanup($model);
        $class = str2_cleanup($class);
        $vehicle_no = str2_cleanup($vehicle_no);
        $sitting_capacity = str2_cleanup($sitting_capacity);
        $fuel_economy = str2_cleanup($fuel_economy);
        $specs = str2_cleanup($specs);
        $rent_per_day = str2_cleanup($rent_per_day);
        $location = str2_cleanup($location);
        $tags = str2_cleanup($tags);

        $query = "UPDATE cars SET " ;
        $query .= "brand = '$brand', ";
        $query .= "model = '$model', ";
        $query .= "class = '$class', ";
        $query .= "vehicle_no = '$vehicle_no', ";
        $query .= "sitting_capacity = '$sitting_capacity', ";
        $query .= "fuel_economy = '$fuel_economy', ";
        $query .= "specs = '$specs', ";
        $query .= "rent_per_day = '$rent_per_day', ";
        $query .= "location = '$location', ";
        $query .= "tags = '$tags' ";
        $query .= "WHERE car_id = $vehicle_id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }
        header("Location: view_car.php?vehicle_id=" . $vehicle_id);
    }
}


function put_on_rent($vehicle_id){
    global $connection;

    if (isset($_POST['submit'])) {
        $from = $_POST['rent_from'];
        $to = $_POST['rent_to'];

        
        $query = "UPDATE cars SET ";
        $query .= "rent_start_date = '$from', ";
        $query .= "rent_end_date = '$to', ";
        $query .= "is_on_rent = 1 ";
        $query .= "WHERE car_id = $vehicle_id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }
        echo "Successfully rented!";

        
    }}

?>