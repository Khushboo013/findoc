<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d6062e77ce.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">
    <title>FinDoc</title>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <?php include 'partials/_nav.php'; ?>

    <!-- DASHBOARD -->

    <div class="bg-[#0d6efd] ">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Booking</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Booking
        </p>
    </div>


    <?php

    include 'partials/_connectdb.php';
    $d_id =  $_SESSION['d_id'];

    $sql = "select doc_name from doctor_register where doc_id = $d_id";
    $result = mysqli_query($conn,$sql);

    while ($row= mysqli_fetch_assoc($result)) {
        $doc_name = $row['doc_name'];
    }

    $query = "select appt_date from booking where doc_id = $d_id";
    $q_result = mysqli_query($conn,$query);
    while ($row= mysqli_fetch_assoc($q_result)) {
        $appt_date = $row['appt_date'];
    }

    ?>

    <div class="grid place-content-center text-center text-gray-800 my-10">
        <div class="border-[1px] border-gray-200 p-10">
            <i class="fa-solid fa-circle-check fa-3x mb-4 fa-beat" style="color: rgb(9 229 171);"></i>
            <p class="text-3xl font-semibold ">Appointment booked Successfully!</p>
            <p class="text-lg">Appointment booked with <span class="font-semibold">Dr. <span><?php echo $doc_name;?></span> </span></p>
            <p class="text-lg">on <span class="font-semibold"><?php echo $appt_date;?></span> </p>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'partials/_footer.php'; ?>

</body>

</html>