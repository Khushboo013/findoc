<?php
session_start();
if (!isset($_SESSION['register']) || $_SESSION['register'] != true) {
    header('location:/doctor-register.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d6062e77ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
    <title>FinDoc</title>
</head>

<body>
    <div class="flex space-x-7">
        <div class="w-1/4 h-[100vh] fixed bg-[#0d6efd] items-center justify-center flex flex-col ">
            <h1 class="font-bold text-[3rem] -mt-6 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                FinDoc</h1>
            <div class="max-w-[15rem] mt-16">
                <img src="/img/login.png" alt="findoc" class="">
            </div>
            <h2 class="text-2xl mt-10 font-bold text-white">Welcome to FinDoc</h2>
            <p class="text-center px-11 py-3 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Dolorum mollitia perferendis ut sed inventore
                adipisci facilis porro officiis quia totam.</p>
        </div>
        <div class="mt-16 w-[23%] left-96 fixed">
            <ul class="flex flex-col space-y-4">
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">1</button>
                    <a href="/doctor-register/onboarding-email.html" class="space-y-1">
                        <h2 class="font-bold ">Registration</h2>
                        <p class="text-sm">Enter Details For Register</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">2</button>
                    <a href="/doctor-register/onboarding-identity.html" class="space-y-1">
                        <h2 class="font-bold ">Upload Identity</h2>
                        <p class="text-sm">Upload Your Identity For Verification</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">3</button>
                    <a href="/doctor-register/onboarding-personalize.html" class="space-y-1">
                        <h2 class="font-bold ">Personal Details</h2>
                        <p class="text-sm">Enter Your Personal Details</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">4</button>
                    <a href="/doctor-register/onboarding-verification.html" class="space-y-1">
                        <h2 class="font-bold ">Doctor Verification</h2>
                        <p class="text-sm">Upload Document for the Verification</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">5</button>
                    <a href="/doctor-register/onboarding-payments.html" class="space-y-1">
                        <h2 class="font-bold ">Payments Details</h2>
                        <p class="text-sm">Setup Your Payment Details</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">6</button>
                    <a href="/doctor-register/onboarding-preferences.html" class="space-y-1">
                        <h2 class="font-bold ">Preferences</h2>
                        <p class="text-sm">Setup Your Preference For your Account</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="right w-[46.5%] border-2 border-gray-100 rounded mb-16 mt-12 left-[47.8rem] relative">
            <div class="m-12">
                <h1 class="font-semibold text-3xl">Preferences<span class=" text-red-600">*</span></h1>
                <p class="mt-3">This can be edited later on from the account settings.</p>
                <form action="" method="post">
                    <div>

                        <?php

                        include "../partials/_connectdb.php";

                        if (isset($_SESSION['id'])) {
                            if (isset($_POST['submit'])) {

                                $cost = $_POST['cost'];
                                $start_date = $_POST['start_date'];
                                $start_time = $_POST['start_time'];
                                $end_time = $_POST['end_time'];
                                $weekday = $_POST['weekday'];
                                $end_date = $_POST['end_date'];

                                $id = $_SESSION['id'];

                                $chk = "";
                                foreach ($weekday as $chk1) {
                                    $chk .= $chk1 . ",";
                                }

                                $sql = "UPDATE `doctor_register` SET `cost_of_consultation` = '$cost', `availability_date_start` = '$start_date', `start_time` = '$start_time', `end_time` = '$end_time', `week_days` = '$chk', `availability_date_end` = '$end_date' WHERE `doctor_register`.`doc_id` = $id";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    session_unset();
                                    session_destroy();
                                    echo '<script>
                                            window.location.href = "/login.php"
                                        </script>';
                                } else {
                                    echo mysqli_error($conn);
                                }
                            }
                        }

                        ?>

                        <div class="mt-6 mb-6 w-full border-[1px] border-gray-300 rounded text-left">
                            <details class="outline-none rounded w-[34rem] mr-3 p-3 bg-transparent">
                                <summary class=" ml-4 text-lg font-semibold">Cost of Consultation</summary>
                                <p class="my-2 ml-4 text-gray-700">What is the maximum cost per
                                    consultation?<span class=" text-red-600">*</span></p>
                                <input class="outline-none rounded w-[34rem] mr-3 p-3 ml-4 mt-4 border-[1px] border-gray-300 bg-transparent focus-within:border-[#09e5ab]" type="text" name="cost" id="" placeholder="Enter Amount in Rupees">
                            </details>
                        </div>
                        <div class=" mb-6 w-full border-[1px] border-gray-300 rounded text-left">
                            <details class="outline-none rounded w-[34rem] mr-3 p-3 bg-transparent">
                                <summary class=" ml-4 text-lg font-semibold">Availabilities</summary>
                                <p class="my-2 ml-4 text-gray-700">Add availability<span class=" text-red-600">*</span></p>

                                <div class="ml-4">
                                    <p class="mb-2 mt-4 font-semibold">Date</p>
                                    <input type="date" name="start_date" id="" class="w-[100%] border-[1px] outline-none border-gray-300 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                                </div>


                                <div class="ml-4">
                                    <p class="mb-2 mt-4 font-semibold">Time will you be available?</p>
                                    <div class="flex justify-between">
                                        <div>
                                            <span class="text-gray-700 text-sm">Start Time</span>
                                            <input type="time" name="start_time" id="" class="w-[15.2rem] border-[1px] outline-none border-gray-300 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                                        </div>
                                        <div>
                                            <span class="text-gray-700 text-sm">End Time</span>
                                            <input type="time" name="end_time" id="" class="w-[15.2rem] border-[1px] outline-none border-gray-300 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                                        </div>
                                    </div>
                                </div>

                                <div class="weekDays-selector ml-4">
                                    <p class="mb-2 mt-4 font-semibold">Choose any day of the week to repeat this availability.</p>

                                    <input type="checkbox" id="weekday-mon" class="weekday h-10 w-7" name="weekday[]" value="mon">
                                    <label for="weekday-mon" class="mr-2" >Mon</label>
                                    <input type="checkbox" id="weekday-tue" class="weekday h-10 w-7" name="weekday[]" value="tue">
                                    <label for="weekday-tue" class="mr-2">Tue</label>
                                    <input type="checkbox" id="weekday-wed" class="weekday h-10 w-7" name="weekday[]" value="wed">
                                    <label for="weekday-wed" class="mr-2">Wed</label>
                                    <input type="checkbox" id="weekday-thu" class="weekday h-10 w-7" name="weekday[]" value="thur">
                                    <label for="weekday-thu" class="mr-2">Thu</label>
                                    <input type="checkbox" id="weekday-fri" class="weekday h-10 w-7" name="weekday[]" value="fri">
                                    <label for="weekday-fri" class="mr-2">Fri</label>
                                    <input type="checkbox" id="weekday-sat" class="weekday h-10 w-7" name="weekday[]" value="sat">
                                    <label for="weekday-sat" class="mr-2">Sat</label>
                                    <input type="checkbox" id="weekday-sun" class="weekday h-10 w-7" name="weekday[]" value="sun">
                                    <label for="weekday-sun" class="">Sun</label>
                                </div>
                                <div class="ml-4">
                                    <p class="mb-2 mt-4 font-semibold">Repeat this schedule until</p>
                                    <input type="date" name="end_date" id="" class="w-[100%] border-[1px] outline-none border-gray-300 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                                </div>
                            </details>
                        </div>


                    </div>
                    <button name="submit" class="px-11 py-3 mt-16 text-lg font-semibold rounded-md text-white border-2 border-[#09e5ab] bg-[#09e5ab] hover:bg-cyan-600">Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>