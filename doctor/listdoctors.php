<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';


//select all docttors
$selectDoctors = "select doctors.id , doctors.name , fields.name as fieldName from doctors JOIN fields
on doctors.fieldid = fields.id;";
$sDoctors = mysqli_query($conn , $selectDoctors);

// testMessage($sDoctors , "select ");

// delete doctor
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteDoctor = "DELETE FROM `doctors` WHERE id = $id ";
    $ddoctor = mysqli_query($conn , $deleteDoctor);
    // testMessage($ddoctor , "Deleted");
    header("location: /SSDG1/HospitalSystem/doctor/listdoctors.php");
}
Auth();

?>

<div class="home">
    <h1 class="text-center text-info b  my-5">Welcome To List Doctord Page</h1>
</div>

<div class="container col-6">
    <div class="card" style="background-color: gray;">
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Field Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sDoctors  as $data){?>
                    <tr>
                        <th><?php  echo $data['id'] ?></th>
                        <th><?php  echo $data['name'] ?></th>
                        <th><?php  echo $data['fieldName'] ?></th>
                        <th>
                            <a href="/SSDG1/HospitalSystem/doctor/listdoctors.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="/SSDG1/HospitalSystem/doctor/adddoctor.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary">update</a>
                        </th>

                    </tr>
                    <?php }?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include '../shared/scripts.php' ?>