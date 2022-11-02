<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/congigDB.php';
include  '../general/functions.php';

// 



// login
if(isset($_POST['login'])){
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];

    $select = "SELECT * FROM `admin` where name = '$adminName' And password = '$adminPassword' ";
    $sadmin = mysqli_query($conn , $select);

    $row = mysqli_fetch_assoc($sadmin);
    $adminname = $row['name'];

    $count2 =mysqli_num_rows($sadmin);
    // echo  $count2;
    if($count2  == 1 ){

        $_SESSION['admin'] = $adminname;

        // print_r($_SESSION);

        header("location: /SSDG1/HospitalSystem");
    }else{
        header("location: /SSDG1/HospitalSystem/admin/loginAdmin.php");
    }
}

?>


<div class="container col-6 mt-5">
    <div class="card" style="background-color: gray;">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Admin Name</label>
                    <input type="text" name="adminName" class="form-control" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="password" name="adminPassword" class="form-control" placeholder="Enter Your Password">
                </div>

                <button name="login" class="btn btn-success btn-block w-50 mx-auto">Login</button>
            </form>
        </div>
    </div>
</div>



<?php include '../shared/scripts.php' ?>