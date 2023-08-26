<?php session_start() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">WheelsDrive</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == "admin") {
            ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Dashboard</a>
            </li>
            <?php
          }
        }
        ?>

      </ul>
      <?php
      if (!isset($_SESSION['email'])) {
        ?>
        <a class="btn btn-primary me-md-2" href="login.php">Login</a>
        <a class="btn btn-secondary me-md-2" href="register.php">Register</a>
        <?php
      } else {
        ?>
        <div class="text-light">
          <b>Welcome,&nbsp</b>
          <?php echo $_SESSION['name'] ?>
        </div>
        <a class="btn btn-primary me-md-2 mx-1" href="components/logout.php">&nbsp Logout</a>
        <?php
      }
      ?>

    </div>
  </div>
</nav>