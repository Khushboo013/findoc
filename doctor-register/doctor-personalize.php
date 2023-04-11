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
                    <h1 class="font-semibold text-3xl">Personalize Your Profile<span class="text-red-600">*</span></h1>
                    <div class="mt-6 w-[100%] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] flex flex-col"><input class="outline-none p-3 rounded w-[34rem] mr-3  bg-transparent" type="file" name="upload_pic" id="" placeholder="">
                    </div>
                    <span class="ml-3 mt-4 text-gray-600">Supported File Format jpg,png,jepg</span>
                    <div class="mt-10">
                        <p class="mb-2 mt-4">Name<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="name" id="" placeholder="Name" value="<?php echo $_SESSION["name"]; ?>">
                        <div class="flex justify-between">
                            <div>
                                <p class="mb-2 mt-4">Gender<span class="text-red-600">*</span></p>
                                <select id="gender" name="gender" class="w-[17.5rem] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                                    <option value="Male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div>
                                <p class="mb-2 mt-4">Date of Birth <span class="text-red-600">*</span></p>
                                <input type="date" name="dob" id="" class="w-[17.5rem] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] mr-3 p-3">
                            </div>
                        </div>
                        <p class="mb-2 mt-4">Address<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="address" id="" placeholder="Enter Address">
                        <div class="flex justify-between">
                            <div>
                                <p class="mb-2 mt-4">City<span class="text-red-600">*</span></p>
                                <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[17.5rem] mr-3  bg-transparent" type="text" name="city" id="" placeholder="Enter City">
                            </div>
                            <div>
                                <p class="mb-2 mt-4">State<span class="text-red-600">*</span></p>
                                <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[17.5rem] mr-3  bg-transparent" type="text" name="state" id="" placeholder="Enter State">
                            </div>
                        </div>
                        <p class="mb-2 mt-4">About You<span class="text-red-600">*</span></p>
                        <textarea class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" name="about" id="" cols="30" rows="5"></textarea>

                    </div>

                        <button name="submit" class="px-11 py-3 mt-16 text-lg font-semibold rounded-md text-white border-2 border-[#09e5ab] bg-[#09e5ab] hover:bg-cyan-600">Continue</button>

                    <?php

                    include "../partials/_connectdb.php";

                    if (isset($_SESSION['id'])) {
                        if (isset($_POST['submit'])) {

                            $gender = $_POST['gender'];
                            $dob = $_POST['dob'];
                            // $age = $_POST['age'];
                            $address = $_POST['address'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $about = $_POST['about'];

                            $filename = $_FILES['upload_pic']['name'];
                            $tempname = $_FILES['upload_pic']['tmp_name'];
                            $target_dir = "../uploads/d-img/" . $filename;

                            move_uploaded_file($tempname, $target_dir);

                            $id = $_SESSION['id'];

                            $sql = "UPDATE `doctor_register` SET `gender` = '$gender', `dob` = '$dob', `address` = '$address', `city` = '$city', `state` = '$state', `about` = '$about', `doc_pic` = '$target_dir' WHERE `doctor_register`.`doc_id` = $id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                // echo "email updated";
                                echo '<script>
                             window.location.href = "/doctor-register/doctor-verification.php"
                             </script>';
                                // header('location:/patient-register/patient-identity.php');
                            } else {
                                // echo "eroore here";
                                echo mysqli_error($conn);
                            }
                        }
                    }

                    ?>
                </form>
            </div>

        </div>
    </div>

</body>

</html>