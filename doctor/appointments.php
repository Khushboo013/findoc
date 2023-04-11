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
    <?php include '../partials/_nav.php'; ?>

    <!-- DASHBOARD -->

    <div class="bg-[#0d6efd]">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Dashboard</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Dashboard</p>
    </div>


    <?php

include '../partials/_connectdb.php';

$d_id =  $_SESSION['d_id'];

$sql = "SELECT * FROM `doctor_register` where `doc_id` = $d_id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name = $row['doc_name'];
$spec = $row['specialisation'];
$city = $row['city'];
$state = $row['state'];
$img = $row['doc_pic'];

?>


    <div class="flex ">
        <div class=" w-96 mx-7 my-7 min-h-full ">
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
                        <a href="/doctor-dashboard.php">
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


        <!-- ---- Appointments------------------>

        <div class=" rounded-md pb-7 ">
            <p class="text-2xl font-semibold p-4 ml-4 ">Today’s Appointments</p>
            <hr>

            <!-- patients............................. -->



            <?php

            include '../partials/_connectdb.php';

            $d_id =  $_SESSION['d_id'];

            // Booking details............

            $book_detail = "select * from booking where doc_id = $d_id";
            $book_detail_result = mysqli_query($conn, $book_detail);

            while ($b_row =  mysqli_fetch_assoc($book_detail_result)) {

                $appt_date = $b_row['appt_date'];
                // $book_date = $b_row['book_date'];
                $p_id = $b_row['patient_id'];

                // patient details.......

                $pat_detail = "select patient_name, patient_email, patient_mobile, city, state, patient_pic from patient_register where patient_id = $p_id";

                $pat_detail_result = mysqli_query($conn, $pat_detail);

                $p_row = mysqli_fetch_assoc($pat_detail_result);

                $patient_name = $p_row['patient_name'];
                $patient_email = $p_row['patient_email'];
                $patient_num = $p_row['patient_mobile'];
                $patient_city = $p_row['city'];
                $patient_state = $p_row['state'];
                $pic = $p_row['patient_pic'];


                echo '<div class="mt-6">
                                    <div class=" flex cursor-pointer hover:bg-gray-200 rounded-md border-[1px] border-gray-200 p-3">
                                        <div class="m-2">
                                                <img src="' . $pic . '" alt="" class="h-36 w-36 rounded-md">
                                            </div>
                                            <div class="flex justify-between w-[830px]">
                                                <div class="ml-4 grid place-content-center">
                                                    <p class="font-bold">' . $patient_name . '</p>
                                                    <p class="text-gray-600 text-sm"><i class="mr-2 fa-regular fa-clock"></i>' . date("jS  M Y", strtotime(str_replace('-', '/', $appt_date))) . '</p>
                                                    <p class="text-gray-600 text-sm"><i class="mr-2 fa-solid fa-location-dot"></i>' . $patient_city . ',
                                                    ' . $patient_state . 's</p>
                                                    <p class="text-gray-600 text-sm"><i class="mr-2 fa-solid fa-envelope"></i>' . $patient_email . '
                                                    </p>
                                                    <p class="text-gray-600 text-sm"><i class="mr-2 fa-solid fa-phone"></i>' . $patient_num . '</p>
                                                </div>

                                                <div class="grid grid-flow-col place-content-center">
                                                    <button class="mx-2 py-1 px-4 bg-blue-100 text-blue-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i
                                                            class="fa-regular fa-eye mx-1"></i>View</button>

                                                    <button class="mx-2 py-1 px-4 bg-green-100 text-green-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i
                                                            class="fa-solid fa-check mx-1"></i>Accept</button>
                                                    <button class="mx-2 py-1 px-4 bg-red-100 text-red-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i
                                                            class="fa-solid fa-xmark mx-1"></i>Cancel</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>';
            }

            ?>




            <!-- end patient.......... -->

        </div>
    </div>



    <!-- Footer -->

    <?php include '../partials/_footer.php'; ?>
</body>

</html>