<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';
// 


if(isset($_POST['addfield'])){
    $fname = $_POST['fieldname'] ;


    $insert = "INSERT INTO `fields` VALUES(null ,  '$fname')";
    $inserdField = mysqli_query($conn , $insert);

    testMessage($inserdField , "Insert");
}

// get all fields
$selectfiled = "SELECT * FROM   `fields`";
$fileds = mysqli_query($conn , $selectfiled);
// testMessage($fileds , "select");




// update doctor
$fieldname = '';
$updatestatus = false;



if(isset($_GET['edit'])){
    $updatestatus = true;
    $id = $_GET['edit'];
     $selectFieldByID =   "SELECT * FROM    `fields` where id = $id ";
    $selectById = mysqli_query($conn , $selectFieldByID);

    $row = mysqli_fetch_assoc($selectById);
    $fieldname = $row['name'];


    if(isset($_POST['updatefield'])){
        $Fname = $_POST['fieldname'] ;
    
         $updateField = "UPDATE `fields` SET name = '$Fname'  WHERE id = $id";
         $updateQuery = mysqli_query($conn , $updateField);
         testMessage($updateQuery , "Updated");
    }

}
Auth();
?>




<div class="home">
    <h1 class="text-center text-info b  my-5">Welcome To add Field page</h1>
</div>

<div class="container col-6">
<a href="/SSDG1/HospitalSystem/fields/listfields.php" class="btn btn-outline-success">List Field</a>

    <div class="card" style="background-color: gray;">
        <div class="card-body">
            <form  method="POST">
                <div class="form-group">
                    <label for="">Field Name</label>
                    <input name="fieldname" value="<?php echo $fieldname?>" type="text" class="form-control" placeholder="Enter Field Name">
                </div>


                <?php if($updatestatus):?>
                    <button name="updatefield" class="btn btn-success w-50 mx-auto btn-block">Update Field</button>
                    <?php else:?>
                <button name="addfield" class="btn btn-success w-50 mx-auto btn-block">Add Field</button>
                    <?php endif;?>
            </form>
        </div>
    </div>
</div>



<?php include '../shared/scripts.php' ?>