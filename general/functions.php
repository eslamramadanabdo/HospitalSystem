<?php


function testMessage($condition , $mess){
    if($condition){
        echo "<div class='alert alert-success w-50 mx-auto'>
            <h1 class='text-center b  '>$mess true</h1>
        </div>";
    }else{
        echo "<div class='alert alert-danger mx-auto w-50 text-center'>
        <h1 class='text-center b '>$mess False</h1>
    </div>";
    }
}


function Auth(){
    if($_SESSION['admin']){

    }
    else{
        header("location: /SSDG1/HospitalSystem/admin/loginAdmin.php");
    }
}

?>