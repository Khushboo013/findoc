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
                    <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">3</button>
                    <a href="/doctor-register/onboarding-personalize.html" class="space-y-1">
                        <h2 class="font-bold ">Personal Details</h2>
                        <p class="text-sm">Enter Your Personal Details</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">4</button>
                    <a href="/doctor-register/onboarding-verification.html" class="space-y-1">
                        <h2 class="font-bold ">Doctor Verification</h2>
                        <p class="text-sm">Upload Document for the Verification</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">5</button>
                    <a href="/doctor-register/onboarding-payments.html" class="space-y-1">
                        <h2 class="font-bold ">Payments Details</h2>
                        <p class="text-sm">Setup Your Payment Details</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">6</button>
                    <a href="/doctor-register/onboarding-preferences.html" class="space-y-1">
                        <h2 class="font-bold ">Preferences</h2>
                        <p class="text-sm">Setup Your Preference For your Account</p>
                    </a>

                </li>
            </ul>
        </div>
        <div class="right w-[46.5%] border-2 border-gray-100 rounded mb-16 mt-12 left-[47.8rem] relative">
            <div class="m-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 class="font-semibold text-3xl">Upload identification <span class="-ml-2 text-red-600">*</span>
                    </h1>
                    <p class="mt-3">We need to determine if an identity document is authentic and belongs to you. You just
                        need to go through some steps which will help us to build a secure system together</p>
                    <!-- <button class="mt-6 border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]"> -->
                    <div>
                        <?php

                        include "../partials/_connectdb.php";

                        if (isset($_SESSION['id'])) {
                            if (isset($_POST['submit'])) {

                                $document_type = $_POST['document_type'];
                                $docu_num = $_POST['docu_num'];

                                $sql_dup = "SELECT * from `doctor_register` WHERE `document_num` = '$docu_num'";
                                $result_dup = mysqli_query($conn, $sql_dup);
                                $docu_row = mysqli_num_rows($result_dup);
                                if ($docu_row) {
                                    echo '<div class="bg-red-400 text-white px-6 py-2 mt-4 border-0 rounded relative mb-4 ">
                                    <span class="text-xl inline-block mr-5 align-middle">
                                    <i class="fas fa-circle-exclamation"></i>
                                    </span>
                                    <span class="inline-block align-middle mr-8">
                                    <em class="capitalize">Duplicate document !</em> 
                                    </span>
                                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                    <span>×</span>
                                
                                    </button>
                                </div>';
                                } else {
                                    $filename = $_FILES['document_file']['name'];
                                    $tempname = $_FILES['document_file']['tmp_name'];
                                    $target_dir = "../uploads/d-docu/" . $filename;

                                    move_uploaded_file($tempname, $target_dir);


                                    $id = $_SESSION['id'];
                                    $sql = "UPDATE `doctor_register` SET `document_type` = '$document_type', `document_num` = '$docu_num', `document_source` = '$target_dir' WHERE `doctor_register`.`doc_id` = $id";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        echo '<script>
                                                window.location.href = "/doctor-register/doctor-personalize.php"
                                            </script>';
                                    } else {
                                        echo mysqli_error($conn);
                                    }
                                }
                            }
                        }
                        ?>
                        <select id="country" name="document_type" class="w-[100%] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  mr-3 p-3 mt-6">
                            <option class="p-3" value="adhaar">Adhaar</option>
                            <option value="pan">Pan Card</option>
                            <option value="voter">voter-id card</option>
                            <option value="licence">Driving licence</option>
                        </select>
                        <div class="w-[100%] mt-6 border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]"><input class="outline-none rounded w-[34rem] mr-3 p-3 bg-transparent" type="text" name="docu_num" id="" placeholder="Enter Document Number"></div>
                        <div class="mt-6 w-[100%] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] flex flex-col"><input class="outline-none p-3 rounded w-[34rem] mr-3  bg-transparent" type="file" name="document_file" id="">
                        </div>
                        <span class="ml-3 mt-2 text-gray-600">File Format pdf*</span>
                    </div>

                    <button name="submit" class="px-11 py-3 mt-16 text-lg font-semibold rounded-md text-white border-2 border-[#09e5ab] bg-[#09e5ab] hover:bg-cyan-600">Continue</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>