<?php
session_start();
if (!isset($_SESSION['p_loggedin']) || $_SESSION['p_loggedin'] != true) {
    header('location:/login.php');
}
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

    $id = $_GET['id'];

    $sql = "SELECT * FROM doctor_register WHERE doc_id = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['doc_name'];
        $city = $row['city'];
        $state = $row['state'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $start_date = $row['availability_date_start'];
        $end_date = $row['availability_date_end'];
        $days = $row['week_days'];
        $img = $row['doc_pic'];

        echo '<div class="my-7 flex flex-col mx-28">
        <div class=" flex  rounded-md border-[1px] border-gray-200 px-8 py-9">
            <div class="">
                <img src="' . $img . '" alt="" class="h-20 w-20 rounded-md">
            </div>
            <div class="flex">
                <div class="ml-6 -mt-2">
                    <a href="">
                        <p class="font-semibold text-xl text-[#01cae4] mb-1">
                          <span>Dr. </span>' . $name . '</p>
                    </a>

                    <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-location-dot"></i>' . $city . ',
                        ' . $state . '</p>
                    <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-clock"></i>' . $start_time . ' - ' . $end_time . '</p>
                    <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-calendar-days"></i>' . $start_date . ' - ' . $end_date . '
                    </p>
                    <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-calendar-days"></i>' . $days . '</p>

                </div>
            </div>
        </div>
    </div>';
    }
    ?>



    <div class="border-2 border-gray-200 mx-28 mb-7 p-3">
        <form action="" method="post">
            <div class="p-4">
                <p class="text-xl text-gray-700 font-semibold">Book Date</p>

                <input type="date" name="appt_date" id=""
                    class="outline-none mt-2 border-2 border-gray-300 rounded focus-within:border-[#01cae4] p-3 w-[100%] mr-3  bg-transparent"
                    required>
            </div>
            <div class="flex justify-end mr-3">
                <button name="book"
                    class="bg-[#01cae4] mt-3 py-3 px-16 rounded-md  text-white  font-semibold hover:transition hover:ease-in hover:bg-[#20def8]   uppercase  text-sm ">Book</button>
            </div>
        </form>
    </div>

    <?php
    include 'partials/_connectdb.php';

    $p_id = $_SESSION['p_id'];
    $d_id = $_GET['id'];

    if (isset($_POST['book'])) {
        $date = $_POST['appt_date'];
        $sql = "INSERT INTO `booking` (`appt_date`, `patient_id`, `doc_id`, `book_date`) VALUES ('$date', '$p_id', '$d_id', current_timestamp())";

        $result = mysqli_query($conn, $sql);
        if ($result) {
        //    while ($row=mysqli_fetch_assoc($result)) {
        //     $d_id = $row['d_id'];
        //     echo $d_id;
        $_SESSION['d_id'] = $d_id;
       
            echo '<script>
                       window.location.href = "/booking-success.php"
                  </script>';
        //    }
            
            // header('location:/booking-success.php');
        }
    }



    ?>


    <!-- Footer -->


    <?php include 'partials/_footer.php'; ?>

</body>

</html>