<?php
include "./partials/_connectdb.php";

// echo "helolo";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    if (strlen($mobile) > 10 && strlen($mobile) < 10) {
        echo " enter valid no";
    } else {
        // echo mysqli_error($conn);
        echo "error";
    }
}
            // $sql = "INSERT INTO `patient_register` (`patient_id`, `patient_name`, `patient_mobile`, `patient_password`, `patient_dt`) VALUES ('1', 'khushboo', '111111111', 'as', current_timestamp())";
?>