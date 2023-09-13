<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-click</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="maincontaient">


        <div class="left-side">
            <div class="container">
                <img src="emage1.jpg" class="profile">
                <h5>admin</h5>
                <h2>admin name</h2>
            </div>
            <div class="leftmenu">
                <a href="admin-dashboard.php">Dashboard</a>
                <a href="admin-doctor.php">Doctor</a>
                <a href="admin-petient.php">Patient</a>
                <a href="admin-appointment.php">Appointment</a>
            </div>

        </div>

        <!-- right side  -->
        <div class="right-side">
            <nav>
            <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
                <div class="nav ">
                    <a href="home.php">Logout</a>
                </div>
            </nav>
            <form class=" adimin-signup">
        <h5>update Doctor details</h5>
  <div class="form-group ">
    <label for="first-name">Firstname</label>
  <input type="first-name" class="form-control" id="first-name" placeholder="First Name">
  </div>
  <div class="form-group">
  <label for="last-name">Lastname</label>
    <input type="Last-name" class="form-control" id="Last-name" placeholder="Last-Name">
  </div>
  <div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" id="email"  placeholder="Email">
  </div>
  <div class="form-group">
  <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <a href="doctor-record.php "class="btn btn-primary submit">update</a>
   
</form>
            <footer class="footer">
                <div class="social">
                    <a href=""> <img src="image/facebook.png"></a>
                    <a href=""><img src="image/instagram.png"></a>
                    <a href=""><img src="image/twitter.png"></a>
                    <a href=""><img src="image/whatsapp.png"></a>
                </div>
                <h4>Created By Computer Science Group 3</h4>
            </footer>
</body>

</html>