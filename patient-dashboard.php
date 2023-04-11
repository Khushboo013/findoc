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

<body>
    <!-- Navigation Bar -->
    <?php include 'partials/_nav.php'; ?>

    <!-- DASHBOARD -->

    <?php
    include './partials/_connectdb.php';

    $userId = $_SESSION['p_id'];

    $sql = "SELECT * FROM `patient_register` where `patient_id` = $userId";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row['patient_name'];
    $dob = $row['dob'];
    $age = $row['age'];
    $city = $row['city'];
    $state = $row['state'];
    $bloodGroup = $row['bloodGroup'];
    $bloodPressure = $row['bloodPressure'];
    $glucose = $row['glucose'];
    $heart_rate = $row['heart_rate'];
    $img = $row['patient_pic']


    ?>

    <div class="bg-[#0d6efd] ">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Dashboard</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Dashboard</p>
    </div>

    <div class="flex">
        <!-- here i chnage the w-96 to nothing -->
        <div class="w-96 mx-7 my-7 min-h-full">
            <div class="sticky top-7 border-[1px] border-gray-300">
                <div class="avatar grid place-content-center py-7 ">
                    <img src="<?php echo $img; ?>" alt="" class="w-32 h-32 rounded-full border-4 border-gray-200">
                    <div class="my-2">
                        <p class="name font-semibold text-lg"><?php echo $name; ?></p>
                        <div class="text-gray-500 text-sm">
                            <div class="flex my-1">
                                <p class="dob"><i class="fa-solid fa-cake-candles mr-1"></i><?php echo date("jS  M Y", strtotime(str_replace('-', '/', $dob))); ?> 
                                <p class="age">, <?php echo $age; ?> years</p>
                                </p>
                            </div>
                            <div class="flex">
                                <p class="loc"><i class="fa-solid fa-location-dot mr-1"></i><?php echo $city; ?>,
                                <p class="state"><?php echo $state; ?></p>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="">
                    <ul class="">
                        <a href="">
                            <li class="border-y-[1px] border-gray-300 py-3 pl-4"><i
                                    class="fa-solid fa-table-columns mr-2"></i>Dashboard</li>
                        </a>
                        <a href="/logout.php">
                            <li class="py-3 pl-4"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>


        <div class="">
            <div class="flex my-7">
                <div
                    class="bloodG border-[1px] border-gray-300 w-56 h-44 text-center grid place-content-center font-semibold">
                    <img src="/img/drop-of-blood.png" alt="" class="w-20 h-20 ">
                    <p>Blood Group</p>
                    <p class="bloodGroup uppercase"><?php echo $bloodGroup; ?></p>
                </div>
                <div
                    class="bloodP border-[1px] border-gray-300 w-56 h-44 text-center grid place-content-center font-semibold mx-5">
                    <img src="/img/bloodPressure.png" alt="" class="w-20 h-20">
                    <p>Blood Pressure</p>
                    <div class="flex justify-center items-center">
                        <p class="bloodPressure"><?php echo $bloodPressure; ?></p>
                        <p class="mt-1 text-sm ml-1 text-gray-600">mg/dl</p>
                    </div>
                </div>
                <div
                    class="bloodP border-[1px] border-gray-300 w-56 h-44 text-center grid place-content-center font-semibold">
                    <img src="/img/bloodPressure.png" alt="" class="w-20 h-20">
                    <p>Glucose Level</p>
                    <div class="flex justify-center items-center">
                        <p class="bloodPressure"><?php echo $glucose; ?></p>
                        <!-- <p class="mt-1 text-sm ml-1 text-gray-600">mg/dl</p> -->
                    </div>
                </div>
                <div
                    class="bloodP border-[1px] border-gray-300 w-56 h-44 text-center grid place-content-center font-semibold mx-5">
                    <img src="/img/bloodPressure.png" alt="" class="w-20 h-20">
                    <p>Heart Rate</p>
                    <div class="flex justify-center items-center">
                        <p class="bloodPressure"><?php echo $heart_rate; ?></p>
                        <!-- <p class="mt-1 text-sm ml-1 text-gray-600">mg/dl</p> -->
                    </div>
                </div>
            </div>

<!--  -->
            <div class="bg-white rounded-md border-[1px] border-gray-300 mb-8 p-5 w-[1050px]">
                <p class="text-xl font-semibold p-4 ml-4 ">Appointments</p>
                <hr>


<!--  -->
                <div class="flex flex-col border-[1px] border-gray-300 mt-4">
                    <div class=" sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full ">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="font-bold text-gray-900 px-6 py-4 text-left">
                                                Doctor
                                            </th>
                                            <th scope="col" class="font-bold text-gray-900 px-6 py-4 text-left">
                                                Appt Date
                                            </th>
                                            <th scope="col" class="font-bold text-gray-900 px-6 py-4 text-left">
                                                Booking Date
                                            </th>
                                            <th scope="col" class="font-bold text-gray-900 px-6 py-4 text-left">
                                                Amount
                                            </th>
                                            <th scope="col" class="font-bold text-gray-900 px-6 py-4 text-left">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DOctor appointment detail in user dashboard  -->
                                        <?php

                                        include 'partials/_connectdb.php';
                                        // $d_id =  $_SESSION['d_id'];
                                        $p_id =  $_SESSION['p_id'];

                                        // Booking details............

                                        $book_detail = "select * from booking where patient_id = $p_id";
                                        $book_detail_result = mysqli_query($conn, $book_detail);

                                        // $b_row =  mysqli_fetch_assoc($book_detail_result);

                                        // loop to show the results

                                        while ($b_row =  mysqli_fetch_assoc($book_detail_result)) {

                                            $appt_date = $b_row['appt_date'];
                                            $book_date = $b_row['book_date'];
                                            $d_id = $b_row['doc_id'];

                                            // doctor details.......

                                            $doc_detail = "select doc_name , doc_pic, specialisation , cost_of_consultation from doctor_register where doc_id = $d_id";

                                            $doc_detail_result = mysqli_query($conn, $doc_detail);

                                            $d_row = mysqli_fetch_assoc($doc_detail_result);
                                            $doc_name = $d_row['doc_name'];
                                            $spec = $d_row['specialisation'];
                                            $cost = $d_row['cost_of_consultation'];
                                            $pic = $d_row['doc_pic'];

                                            echo '<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 ">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex">
                                                    <div>
                                                        <img src="' . $pic . '" alt="" class="rounded-full h-10 w-10">
                                                    </div>
                                                    <div class="ml-2">
                                                        <p>Dr. ' . $doc_name . '</p>
                                                        <p class="text-sm text-gray-500">' . $spec . '</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="  py-4  whitespace-nowrap">
                                                <div class="ml-2">
                                                    <p>'  . date("jS  M Y", strtotime(str_replace('-', '/', $appt_date))) . '</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            ' . date("jS  M Y", strtotime(str_replace('-', '/', $book_date))) . '
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            ₹' . $cost . '
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class=" py-[2px] px-4 bg-green-100 text-green-700 text-[12px] font-bold rounded-full">Confirm</button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap ">
                                            <a href="/doctor/profile.php?id='.$d_id.'">
                                                <button class="mx-2 py-1 px-4 bg-blue-100 text-blue-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-regular fa-eye mx-1"></i>View</button>
                                                </a>
                                            </td>
                                        </tr>';
                                        }


                                        ?>


                                        <!-- use loop to iterate ............ -->
                                        <!-- <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 ">
                                            <td class="px-6 py-4 whitespace-nowrap pr-20">
                                                <div class="flex">
                                                    <div>
                                                        <img src="/img/doctors/doctor-thumb-02.jpg" alt="" class="rounded-full h-10 w-10">
                                                    </div>
                                                    <div class="ml-2">
                                                        <p>Dr. Ruby Perrin</p>
                                                        <p class="text-sm text-gray-500">Dental</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" px-4 py-4  pr-12 whitespace-nowrap">
                                                <div class="ml-2">
                                                    <p>14 Nov 2019</p>
                                                    <p class="text-sm text-cyan-500">10.00 AM</p>
                                                </div>
                                            </td>
                                            <td class=" px-6 py-4 whitespace-nowrap  pr-12">
                                                12 Nov 2019
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap  pr-12">
                                                $160
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap  pr-12">
                                                <button class=" py-[2px] px-4 bg-green-100 text-green-700 text-[12px] font-bold rounded-full">Confirm</button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap  pr-10">
                                                <button class="mx-2 py-1 px-4 bg-blue-100 text-blue-700 text-sm font-semibold hover:scale-110 transition duration-[0.5s] ease-in-out"><i class="fa-regular fa-eye mx-1"></i>View</button>
                                            </td>
                                        </tr> -->
                                        <!-- ENd loop -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php include 'partials/_footer.php'; ?>

</body>

</html>