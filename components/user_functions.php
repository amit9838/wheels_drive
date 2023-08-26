<?php session_start() ?>
<?php include 'db.php' ?>

<?php
function get_users()
{
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Querry FAILED " . mysqli_error($connection));
    }
    return $result;
}

function display_options($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value = '$id'>$id - $name </option>";
    }
}

function str_cleanup($input)
{
    global $connection;
    return mysqli_real_escape_string($connection, $input);
}

function hashed_password($password)
{
    $hashForamt = "$2y$10$";
    $salt = "iusedsomecrazystring22";
    $hashF_and_salt = $hashForamt . $salt;
    $new_password = crypt($password, $hashF_and_salt);
    return $new_password;
}

function create_user($role)
{

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if ($password != $password1)
            die("Password didn't match!");

        $name = str_cleanup($name);
        $email = str_cleanup($email);
        $password = str_cleanup($password);

        $password = hashed_password($password);

        if (!$email) {
            echo "please provide email";
            // return;
        }
        if (!$password) {
            echo "please provide password";
            // return;
        }

        // echo "value subimitted";
        if ($email && $password && $name && $role) {
            global $connection;

            $query = "INSERT INTO users(name,email,password,role) ";
            $query .= "VALUES ('$name','$email','$password','$role')";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Querry FAILED " . mysqli_error($connection));
            }
            echo "Account Created successfully!";
        }

    }
    // return header("Location: register.php");

}

function update_user()
{
    if (isset($_POST['submit'])) {
        global $connection;

        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $email = str_cleanup($email);
        $password = str_cleanup($password);
        $id = str_cleanup($id);

        $password = hashed_password($password);




        $query = "UPDATE users SET ";
        $query .= "email = '$email', ";
        $query .= "password = '$password' ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }

        if (!$email) {
            echo "please provide email";
            // return;
        }
        if (!$password) {
            echo "please provide password";
            // return;
        }
        if ($email && $password) {

            echo "Saved successfully!";
        }
    }
}


function delete_user()
{
    if (isset($_POST['submit'])) {
        global $connection;

        $id = $_POST['id'];


        $query = "DELETE FROM users ";
        $query .= "WHERE users.id = $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Querry FAILED " . mysqli_error($connection));
        }
        echo "Successfully deleted user with id " . $id;
    }
}

function login_user()
{
    if (isset($_POST['submit'])) {
        global $connection;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = str_cleanup($email);
        $password = str_cleanup($password);

        $query = "SELECT * FROM users WHERE email = '${email}'";

        $select_user_query = mysqli_query($connection, $query);

        if (!$select_user_query) {
            die("No user found!");
        } else {
            $password_hash = "";
            $role = "";
            // $name = "";
            // $email = "";

            while ($row = mysqli_fetch_assoc($select_user_query)) {
                $name = $row['name'];
                $email = $row['email'];
                $password_hash = $row['password'];
                $role = $row['role'];

            }
            if (!password_verify($password, $password_hash)) {
                echo "Incorrect password!";
            } else {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                if ($role == "admin") {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: /");
                }
            }
        }
    }
}


function logout()
{
    if (isset($_GET)) {
        $_SESSION['name'] = null;
        $_SESSION['email'] = null;
        $_SESSION['role'] = null;
        header("Location: ");
    } else {
        // header("Locaton: ");
    }

}

function view_users()
{
    global $connection;
    $result = NULL;

    $query = "SELECT * from users";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Querry FAILED " . mysqli_error($connection));
    }

    if ($result) {
        header("Location: error_404.php");
    }
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <pre class="bg-light rounded px-3 border-2">
                                                        <?php
                                                        print_r($row);
                                                        ?>
                                                    </pre>

        <?php
    }
}

?>