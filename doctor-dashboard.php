<?php
session_start();

if (!isset($_SESSION['d_loggedin']) || $_SESSION['d_loggedin'] != true) {
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

<body>
    <!-- Navigation Bar -->
    <?php include 'partials/_nav.php'; ?>

    <!-- DASHBOARD -->

    <?php
    include './partials/_connectdb.php';

    $userId = $_SESSION['d_id'];

    $sql = "SELECT * FROM `doctor_register` where `doc_id` = $userId";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row['doc_name'];
    $spec = $row['specialisation'];
    $city = $row['city'];
    $state = $row['state'];
    $img = $row['doc_pic']

    ?>

    <div class="bg-[#0d6efd] ">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Dashboard</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Dashboard</p>
    </div>

    <div class="flex">
        <div class=" w-96 mx-7 my-7 min-h-full">
            <div class="sticky top-7 border-[1px] border-gray-300 ">
                <div class="avatar flex flex-col justify-center items-center py-7 ">
                    <img src="<?php echo $img; ?>" alt="" class="w-32 h-32 rounded-full border-4 border-gray-200">
                    <div class="my-2 text-center">
                        <p class="name font-semibold text-lg">Dr. <?php echo "$name"; ?></p>
                        <div class="text-gray-500 text-sm">
                            <div class="flex my-1 text-center">
                                <p class="dob">BDS, MDS -
                                <p class="spec">- <?php echo "$spec"; ?></p>
                                </p>
                            </div>
                            <div class="flex justify-center items-center">
                                <p class="loc text-center"><i class="fa-solid fa-location-dot mr-1"></i><?php echo $city; ?>,
                                <p class="state"><?php echo $state; ?></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <ul class="">
                        <a href="/doctor-dashboard.html">
                            <li class="border-y-[1px] border-gray-300 py-3 pl-4"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</li>
                        </a>
                        <a href="/doctor/appointments.php">
                            <li class="py-3 pl-4 border-b-[1px] border-gray-300"><i class="fa-solid fa-calendar-check mr-2"></i>Appointements</li>
                        </a>
                        <a href="/logout.php">
                            <li class="py-3 pl-4"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- dashboard upper Part -->
        <div>
            <div class="flex my-7 space-x-7 ">
                <div class="bloodG border-[1px] border-gray-300 w-[20.5rem] h-44 text-center grid place-content-center grid-flow-col font-semibold space-x-4 bg-white">
                    <img src="/img/patient.png" alt="" class="w-20 h-20 ">
                    <div class="">
                        <p class="text-gray-600">
                            Total Patient All time</p>
                        <p class="font-bold text-2xl">1000</p>
                    </div>
                </div>
                <div class="bloodG border-[1px] border-gray-300 w-[20.5rem] h-44 text-center grid place-content-center grid-flow-col  font-semibold space-x-4 bg-white">
                    <img src="/img/appoint.png" alt="" class="w-20 h-20 ">
                    <div>
                        <p class="text-gray-600">Total Appointements</p>
                        <p class="bloodGroup font-bold text-2xl">2122</p>
                    </div>
                </div>
                <div class="bloodP border-[1px] border-gray-300 w-[20.5rem] h-44 text-center grid place-content-center grid-flow-col  font-semibold space-x-4 bg-white">
                    <img src="/img/income.png" alt="" class="w-20 h-20 -ml-3">
                    <div>
                        <p class="text-gray-600">Today’s Income</p>
                        <div class="flex">
                            <p class="bloodPressure font-bold text-2xl"> <span>₹</span>312313</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ---- Appointments------------------>

            <div class="bg-white mb-7 rounded-md pb-7">
                <p class="text-xl font-semibold p-4 ml-4 ">Today’s Appointments</p>
                <hr>
                <!-- patients............................. -->
                <div class="mt-6">
                    <!-- all appointments......Booking -->

                    <?php

                    include 'partials/_connectdb.php';
                    // $d_id =  $_SESSION['d_id'];
                    $d_id =  $_SESSION['d_id'];

                    // Booking details............

                    $book_detail = "select * from booking where doc_id = $d_id";
                    $book_detail_result = mysqli_query($conn, $book_detail);

                    // $b_row =  mysqli_fetch_assoc($book_detail_result);

                    // loop to show the results

                    while ($b_row =  mysqli_fetch_assoc($book_detail_result)) {

                        $appt_date = $b_row['appt_date'];
                        // $book_date = $b_row['book_date'];
                        $p_id = $b_row['patient_id'];

                        // doctor details.......

                        $pat_detail = "select patient_id, patient_name, patient_pic from patient_register where patient_id = $p_id";

                        $pat_detail_result = mysqli_query($conn, $pat_detail);

                        $p_row = mysqli_fetch_assoc($pat_detail_result);

                        $patient_id = $p_row['patient_id'];
                        $patient_name = $p_row['patient_name'];
                        $pic = $p_row['patient_pic'];


                        echo '<div class=" flex cursor-pointer hover:bg-gray-200 rounded-md">
                        <div class="m-2">
                            <img src="' . $pic . '" alt="" class="h-16 w-16 rounded-md">
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="ml-4 grid place-content-center">
                                <p class="font-bold">' . $patient_name . '</p>
                                <p class="text-gray-600">#PT00' . $patient_id . '</p>
                            </div>

                            <div class="grid place-content-center ">
                                <p class="text-gray-600">'.date("jS  M Y", strtotime(str_replace('-', '/', $appt_date))).'</p>
                            </div>

                            <div class="grid grid-flow-col place-content-center ">
                                <button class="mx-2 py-1 px-4 bg-blue-100 text-blue-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-regular fa-eye mx-1"></i>View</button>

                                <button class="mx-2 py-1 px-4 bg-green-100 text-green-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-solid fa-check mx-1"></i>Accept</button>
                                <button class="mx-2 py-1 px-4 bg-red-100 text-red-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-solid fa-xmark mx-1"></i>Cancel</button>
                            </div>
                        </div>
                    </div> <hr>';
                    }

                    ?>
<!-- 
                    <div class="ml-4 grid place-content-center">
                        <p class="font-bold">'.$patient_name.'</p>
                        <p class="text-gray-600">#PT00'.$patient_id.'</p>
                    </div>

                    <div class="grid place-content-center mx-48">
                        <p class="text-gray-600">Appointment</p>
                    </div>

                    <div class="grid grid-flow-col place-content-center ">
                        <button class="mx-2 py-1 px-4 bg-blue-100 text-blue-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-regular fa-eye mx-1"></i>View</button>

                        <button class="mx-2 py-1 px-4 bg-green-100 text-green-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-solid fa-check mx-1"></i>Accept</button>
                        <button class="mx-2 py-1 px-4 bg-red-100 text-red-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-solid fa-xmark mx-1"></i>Cancel</button>
                    </div> -->

                   

                    <!-- end patient.......... -->
                </div>
            </div>
        </div>


    </div>


    <!-- Footer -->

    <?php include 'partials/_footer.php'; ?>

</body>

</html>