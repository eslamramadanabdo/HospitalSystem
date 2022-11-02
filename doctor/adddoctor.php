<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';
// 


if(isset($_POST['adddoctor'])){
    $Dname = $_POST['doctorname'] ;
    $filedid = $_POST['filedid'] ;

    $insert = "INSERT INTO `doctors` VALUES(null , '$Dname' , $filedid)";
    $inserdDoctor = mysqli_query($conn , $insert);

    testMessage($inserdDoctor , "Insert");
}

// get all fields
$selectfiled = "SELECT * FROM   `fields`";
$fileds = mysqli_query($conn , $selectfiled);
// testMessage($fileds , "select");




// update doctor
$doctorname = '';
$updatestatus = false;



if(isset($_GET['edit'])){
    $updatestatus = true;
    $id = $_GET['edit'];
     $selectDoctorByID =   "SELECT * FROM    `doctors` where id = $id ";
    $selectById = mysqli_query($conn , $selectDoctorByID);

    $row = mysqli_fetch_assoc($selectById);
    $doctorname = $row['name'];
    $fildid = $row['fieldid'];


    if(isset($_POST['updateDoctor'])){
        $Dname = $_POST['doctorname'] ;
         $filedid = $_POST['filedid'] ;
    
         $updateDoctor = "UPDATE `doctors` SET name = '$Dname' , fieldid = $filedid WHERE id = $id";
         $updateQuery = mysqli_query($conn , $updateDoctor);
         testMessage($updateQuery , "Updated");
    }

}

?>



<?php 
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
                    <label for="">Doctro Name</label>
                    <input name="doctorname" value="<?php echo $doctorname?>" type="text" class="form-control" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="">field id</label>
                    <select name="filedid" class="form-control">
                        <?php foreach( $fileds as $filed ){?>
                            <option value="<?php echo  $filed['id']?>"> <?php echo  $filed['name'] ?> </option>
                        <?php }?>
                    </select>
                </div>
                <?php if($updatestatus):?>
                    <button name="updateDoctor" class="btn btn-success w-50 mx-auto btn-block">Update Doctor</button>
                    <?php else:?>
                <button name="adddoctor" class="btn btn-success w-50 mx-auto btn-block">Add Doctor</button>
                    <?php endif;?>
            </form>
        </div>
    </div>
</div>



<?php include '../shared/scripts.php' ?>