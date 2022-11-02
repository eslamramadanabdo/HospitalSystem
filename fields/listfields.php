<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';


//select all docttors
    $selectfields = "SELECT * FROM `fields`";
    $sFields = mysqli_query($conn , $selectfields);

// testMessage($sDoctors , "select ");

// delete doctor
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteFields = "DELETE FROM `fields` WHERE id = $id ";
    $dfields = mysqli_query($conn , $deleteFields);
    // testMessage($ddoctor , "Deleted");
    header("location: /SSDG1/HospitalSystem/fields/listfields.php");
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
                        <th>Field Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sFields  as $data){?>
                    <tr>
                        <th><?php  echo $data['id'] ?></th>
                        <th><?php  echo $data['name'] ?></th>
                        <th>
                            <a href="/SSDG1/HospitalSystem/fields/listfields.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="/SSDG1/HospitalSystem/fields/addfield.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary">update</a>
                        </th>

                    </tr>
                    <?php }?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include '../shared/scripts.php' ?>