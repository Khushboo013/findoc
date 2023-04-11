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
            <h1
                class="font-bold text-[3rem] -mt-6 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
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
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">1</button>
                    <a href="/doctor-register/onboarding-email.html" class="space-y-1">
                        <h2 class="font-bold ">Registration</h2>
                        <p class="text-sm">Enter Details For Register</p>
                    </a>

                </li>
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">2</button>
                    <a href="/doctor-register/onboarding-identity.html" class="space-y-1">
                        <h2 class="font-bold ">Upload Identity</h2>
                        <p class="text-sm">Upload Your Identity For Verification</p>
                    </a>

                </li>
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">3</button>
                    <a href="/doctor-register/onboarding-personalize.html" class="space-y-1">
                        <h2 class="font-bold ">Personal Details</h2>
                        <p class="text-sm">Enter Your Personal Details</p>
                    </a>

                </li>
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">4</button>
                    <a href="/doctor-register/onboarding-verification.html" class="space-y-1">
                        <h2 class="font-bold ">Doctor Verification</h2>
                        <p class="text-sm">Upload Document for the Verification</p>
                    </a>

                </li>
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">5</button>
                    <a href="/doctor-register/onboarding-payments.html" class="space-y-1">
                        <h2 class="font-bold ">Payments Details</h2>
                        <p class="text-sm">Setup Your Payment Details</p>
                    </a>

                </li>
                <li
                    class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
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
                <h1 class="font-semibold text-3xl">Doctor Verification <span class="-ml-2 text-red-600">*</span>
                </h1>
                <p class="mt-3 text-gray-500">Please provide the details below and attach copies for your:</p>
                <!-- <button class="mt-6 border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]"> -->
                <div class="mt-10 ml-8">
                    <ul class="list-disc text-gray-800">
                        <li class="mt-5">Certificate of Registration with the Maltese Medical Council OR Registration
                            from the
                            appropriate Professional Council</li>
                        <li class="mt-5">Certificate of Good Standing (from the Maltese Medical Council - valid for 3
                            months from the
                            date of issue). Doctors applying from overseas are to provide a Certificate of Good Standing
                            issued from the most recent country of residence / practise (valid for 3 months from the
                            date of issue) (only applicable for Medical Doctors)</li>
                        <li class="mt-5">Curriculum Vitae</li>
                        <li class="mt-5">Specialist Registration Certificate</li>
                        <li class="mt-5">Digital signature: copy of the signature and registration number</li>
                    </ul>
                </div>
                <form action="" method="post" enctype="multipart/form-data">

                    <?php

                    include "../partials/_connectdb.php";

                    if (isset($_SESSION['id'])) {
                        if (isset($_POST['submit'])) {

                            $regNum = $_POST['regNum'];
                            $spec = $_POST['spec'];
                           
                            $filename = $_FILES['upload_proof']['name'];
                            $tempname = $_FILES['upload_proof']['tmp_name'];
                            $target_dir = "../uploads/d-proof/" . $filename;

                            move_uploaded_file($tempname, $target_dir);

                            $id = $_SESSION['id'];

                            $sql = "UPDATE `doctor_register` SET `med_reg_no` = '$regNum', `med_reg_source` = '$target_dir', `specialisation` = '$spec' WHERE `doctor_register`.`doc_id` = $id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                // echo "email updated";
                                echo '<script>
                             window.location.href = "/doctor-register/doctor-payments.php"
                             </script>';
                                // header('location:/patient-register/patient-identity.php');
                            } else {
                                // echo "eroore here";
                                echo mysqli_error($conn);
                            }
                        }
                    }

                    ?>

                    <div class="mt-12">
                        <p class="font-semibold">Medical council registration number <span class="text-red-600">*</span>
                        </p>
                        <div class="w-[100%] mt-2 border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]">
                            <input class="outline-none rounded w-[34rem] mr-3 p-3 bg-transparent" type="text"
                                name="regNum" id="" placeholder="Medical council registration number"></div>
                    </div>
                    <div>
                        <div
                            class="mt-6 w-[100%] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] flex flex-col"><input
                                class="outline-none p-3 rounded w-[34rem] mr-3  bg-transparent" type="file"
                                name="upload_proof" id="">
                        </div>
                        <span class="ml-3 mt-2 text-gray-600">Upload Document File Format pdf <span
                                class="text-red-600">*</span> </span>
                    </div>
                    <div class="mt-12">
                        <p class="font-semibold">Area of Specialisation<span class="text-red-600">*</span></p>
                        <div
                            class="w-[100%] mt-2 border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]"><input
                                class="outline-none rounded w-[34rem] mr-3 p-3 bg-transparent" type="text" name="spec"
                                id="" placeholder="Area of Specialisation"></div>
                    </div>
                    <button name="submit"
                        class="px-11 py-3 mt-16 text-lg font-semibold rounded-md text-white border-2 border-[#09e5ab] bg-[#09e5ab] hover:bg-cyan-600">Continue</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>