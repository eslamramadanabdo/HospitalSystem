<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';
// 

// select
if(isset($_POST['addpatient'])){
    $Pname = $_POST['pname'] ;
    $doctorid = $_POST['doctorid'] ;

    $insert = "INSERT INTO `patient` VALUES(null , '$Pname' , $doctorid)";
    $inserPatient = mysqli_query($conn , $insert);

    testMessage($inserPatient , "Insert");
}

// get all fields
$selectdoctors = "SELECT * FROM   `doctors`";
$doctors = mysqli_query($conn , $selectdoctors);
// testMessage($fileds , "select");




// update doctor
$patientname = '';
$updatestatus = false;



if(isset($_GET['edit'])){
    $updatestatus = true;
    $id = $_GET['edit'];
     $selectPatientByID =   "SELECT * FROM    `patient` where id = $id ";
    $selectById = mysqli_query($conn , $selectPatientByID);

    $row = mysqli_fetch_assoc($selectById);
    $patientname = $row['name'];
    $doctorid = $row['doctorid'];


    if(isset($_POST['updatepatient'])){
        $pname = $_POST['pname'] ;
         $doctorid = $_POST['doctorid'] ;
    
         $updatePatient = "UPDATE `patient` SET name = '$pname' , doctorid = $doctorid WHERE id = $id";
         $updateQuery = mysqli_query($conn , $updatePatient);
         testMessage($updateQuery , "Updated");
    }

}
Auth();
?>




<div class="home">
    <h1 class="text-center text-info b  my-5">Welcome To add doctor page</h1>
</div>

<div class="container col-6">
    <div class="card" style="background-color: gray;">
        <div class="card-body">
            <form  method="POST">
                <div class="form-group">
                    <label for="">Patient Name</label>
                    <input name="pname"  type="text" value="<?php echo $patientname?>" class="form-control" placeholder="Enter Patient Name">
                </div>

                <div class="form-group">
                    <label for="">Doctor name</label>
                    <select name="doctorid" class="form-control">
                        <?php foreach( $doctors as $filed ){?>
                            <option value="<?php echo  $filed['id']?>"> <?php echo  $filed['name'] ?> </option>
                        <?php }?>
                    </select>
                </div>
                <?php if($updatestatus):?>
                    <button name="updatepatient" class="btn btn-success w-50 mx-auto btn-block">Update Patient</button>
                    <?php else:?>
                <button name="addpatient" class="btn btn-success w-50 mx-auto btn-block">Add Patient</button>
                    <?php endif;?>
            </form>
        </div>
    </div>
</div>



<?php include '../shared/scripts.php' ?>