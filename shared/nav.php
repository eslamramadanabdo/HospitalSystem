

<?php 

session_start();


if(isset($_GET['logout'])){
  session_unset();
  session_destroy();

  header("location: /SSDG1/HospitalSystem/admin/loginAdmin.php");

}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Vizeeta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <?php  if(isset($_SESSION['admin'])):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/doctor/adddoctor.php">Add Doctor</a>
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/doctor/listdoctors.php">List Doctors</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Fields
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/fields/addfield.php">Add Fields</a>
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/fields/listfields.php">List Fields</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Patient
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/patient/addpatient.php">Add Patient</a>
          <a class="dropdown-item" href="/SSDG1/HospitalSystem/patient/listpatient.php">List Patient</a>
        </div>
      </li>
<?php endif; ?>
    </ul>


    <a  href="/SSDG1/HospitalSystem/admin/loginAdmin.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
  
    <form action="" method="GET">
    <button  name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>
