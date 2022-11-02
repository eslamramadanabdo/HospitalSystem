<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';


//select all docttors
$selectPateint = "select patient.id  , patient.name , doctors.name as Dname from patient JOIN doctors
on doctors.id = patient.doctorid;";
$sPatients = mysqli_query($conn , $selectPateint);

// testMessage($sDoctors , "select ");

// delete pateints
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deletePatitent = "DELETE FROM `patient` WHERE id = $id ";
    $dpatient = mysqli_query($conn , $deletePatitent);
    // testMessage($ddoctor , "Deleted");
    header("location: /SSDG1/HospitalSystem/patient/listpatient.php");
}

Auth();
?>

<div class="home">
    <h1 class="text-center text-info b  my-5">Welcome To List Patients Page</h1>
</div>

<div class="container col-6">
    <div class="card" style="background-color: gray;">
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Doctor Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sPatients  as $data){?>
                    <tr>
                        <th><?php  echo $data['id'] ?></th>
                        <th><?php  echo $data['name'] ?></th>
                        <th><?php  echo $data['Dname'] ?></th>
                        <th>
                            <a href="/SSDG1/HospitalSystem/patient/listpatient.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="/SSDG1/HospitalSystem/patient/addpatient.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary">update</a>
                        </th>

                    </tr>
                    <?php }?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include '../shared/scripts.php' ?>