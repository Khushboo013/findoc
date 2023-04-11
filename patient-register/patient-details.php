<?php
session_start();
if (!isset($_SESSION['register']) || $_SESSION['register'] != true) {
    header('location:/patient-register.php');
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
    <link rel="stylesheet" href="../style.css">
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
                    <a href="/patient-register/patient-email.php" class="space-y-1">
                        <h2 class="font-bold ">Registration</h2>
                        <p class="text-sm">Enter Details For Register</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2  pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">2</button>
                    <a href="/patient-register/patient-identity.php" class="space-y-1">
                        <h2 class="font-bold ">Upload Identity</h2>
                        <p class="text-sm">Upload Your Identity For Verification</p>
                    </a>

                </li>
                <li class="flex space-x-4 shadow-mg rounded pl-2 pb-[0.80rem] pt-2 hover:shadow-lg border-2 border-gray-100">
                    <button class="mt-2 bg-[#10916F] w-9 h-9 rounded-full  text-white">3</button>
                    <a href="/patient-register/patient-details.php" class="space-y-1">
                        <h2 class="font-bold ">Personal Details</h2>
                        <p class="text-sm">Enter Your Personal Details</p>
                    </a>

                </li>

            </ul>
        </div>
        <div class="right w-[46.5%] border-2 border-gray-100 rounded mb-16 mt-12 left-[47.8rem] relative">
            <div class="m-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 class="font-semibold text-3xl">What are your personal details?<span class="text-red-600">*</span>
                    </h1>
                    <p class="mt-3">Please provide your personal information</p>
                    <div class="mt-6 w-[100%] border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab] flex flex-col"><input class="outline-none p-3 rounded w-[34rem] mr-3  bg-transparent" type="file" name="upload_pic" id="upload_pic" placeholder="">
                    </div>
                    <span class="ml-3 mt-4 text-gray-600">Supported File Format jpg,png,jepg</span>
                    <div class="mt-10">
                        <p class="mb-2 mt-4">Name<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="name" id="" placeholder="Email Address" value="<?php echo $_SESSION["name"]; ?>" disabled>
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

                        <p class="mb-2 mt-4">Age<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="age" id="" placeholder="Enter your Blood Type">

                        <p class="mb-2 mt-4">Blood Group<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="bloodGroup" id="" placeholder="Enter your Blood Type">

                        <p class="mb-2 mt-4">Blood Pressure<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="bloodPressure" id="" placeholder="Enter your Blood Pressure ">

                        <p class="mb-2 mt-4">Allergies<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="allergies" id="" placeholder="Allergies">

                        <p class="mb-2 mt-4">Glucose<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="glucose" id="" placeholder="Glucose">

                        <p class="mb-2 mt-4">Heart Rate<span class="text-red-600">*</span></p>
                        <input class="outline-none  border-[1px] border-gray-100 rounded focus-within:border-[#09e5ab]  p-3 w-[100%] mr-3  bg-transparent" type="text" name="heart_rate" id="" placeholder="Heart Rate">

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
                        <!-- <div class="flex mb-2 mt-6 space-x-10">
                        <p class="">Do you have any pre-exisiting conditions?</p>
                        <input type="checkbox" name="" id="">
                    </div>
                    <div class="flex mb-2 mt-6 space-x-10">
                        <p class="">Are you currently taking any medication</p>
                        <input type="checkbox" name="" id="">
                    </div> -->

                    </div>

                    <a href="/patient-dashboard.html" class="">
                        <button name="submit" class="px-11 py-3 mt-16 text-lg font-semibold rounded-md text-white border-2 border-[#09e5ab] bg-[#09e5ab] hover:bg-cyan-600">Save</button>
                        <!-- </a> -->



                        <?php

                        include "../partials/_connectdb.php";

                        if (isset($_SESSION['id'])) {
                            if (isset($_POST['submit'])) {

                                $gender = $_POST['gender'];
                                $dob = $_POST['dob'];
                                $age = $_POST['age'];
                                $bloodGroup = $_POST['bloodGroup'];
                                $bloodPressure = $_POST['bloodPressure'];
                                $allergies = $_POST['allergies'];
                                $allergies = $_POST['allergies'];
                                $glucose = $_POST['glucose'];
                                $heart_rate = $_POST['heart_rate'];
                                $city = $_POST['city'];
                                $state = $_POST['state'];

                                $filename = $_FILES['upload_pic']['name'];
                                $tempname = $_FILES['upload_pic']['tmp_name'];
                                $target_dir = "../uploads/p-img/" . $filename;

                                move_uploaded_file($tempname, $target_dir);

                                $id = $_SESSION['id'];

                                $sql = "UPDATE `patient_register` SET `gender` = '$gender', `dob` = '$dob', `age` = '$age', `bloodGroup` = '$bloodGroup', `bloodPressure` = '$bloodPressure', `allergies` = '$allergies', `glucose` = '$glucose', `heart_rate` = '$heart_rate',`address` = '$address', `city` = '$city', `state` = '$state', `patient_pic` = '$target_dir' WHERE `patient_register`.`patient_id` = $id";
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
                </form>
            </div>
        </div>
    </div>

</body>

</html>