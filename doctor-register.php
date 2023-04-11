<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d6062e77ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
    <title>FinDOc</title>
</head>

<body>
    <!-- Navigation Bar -->
   <?php include 'partials/_nav.php';?>

    <div class="flex justify-center items-center space-x-6 m-14">
        <div>
            <img src="/img/loignPage.png" alt="" class="w-[29rem] text-center ">
        </div>
        <div class=" border-[1px] border-gray-300 w-[35%] p-9 rounded">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="flex flex-row pb-4 justify-between">
                    <h2 class="font-bold text-2xl">Doctor Register</h2>
                    <a href="/patient-register.php" class="text-cyan-400">Not a Doctor?</a>
                </div>
                <div class="flex flex-col ">
                    <?php
                    include "partials/_connectdb.php";

                    if (isset($_POST['submit'])) {

                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $password = $_POST['password'];

                        $doc= "SELECT * FROM `doctor_register` where `doc_mobile` = '$mobile'";
                        $doc_match = mysqli_query($conn, $doc);
                        $doc_row = mysqli_num_rows($doc_match);

                        $patient= "SELECT * FROM `patient_register` where `patient_mobile` = '$mobile'";
                        $patient_match = mysqli_query($conn, $patient);
                        $patient_row = mysqli_num_rows($patient_match);

                        if ($doc_row > 0 || $patient_row > 0) {
                            echo '<div class="bg-red-400 text-white px-6 py-2 border-0 rounded relative mb-4 ">
                                    <span class="text-xl inline-block mr-5 align-middle">
                                    <i class="fas fa-circle-exclamation"></i>
                                    </span>
                                    <span class="inline-block align-middle mr-8">
                                    <b class="capitalize"><em>Mobile number already exists !</em></b> 
                                    </span>
                                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                    <span>×</span>
                                
                                    </button>
                                </div>';
                        } else {
                            $sql = "INSERT INTO `doctor_register` (`doc_name`, `doc_mobile`, `doc_password`, `doc_dt`) VALUES ('$name', '$mobile', '$password', current_timestamp())";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sql_id =  "SELECT * FROM `doctor_register` where `doc_mobile` = '$mobile'";
                                $result_id = mysqli_query($conn, $sql_id);
                                $row = mysqli_fetch_assoc($result_id);
                                $id = $row['doc_id'];
                                $name = $row['doc_name'];
                                session_start();
                                $_SESSION['register'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['name'] = $name;

                                header('location:doctor-register/doctor-email.php');
                            } else {
                                echo '<div class="bg-red-400 text-white px-6 py-2 border-0 rounded relative mb-4 ">
                                <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-circle-exclamation"></i>
                                </span>
                                <span class="inline-block align-middle mr-8">
                                <b class="capitalize"><em>Unexpected Error !</em></b> 
                                </span>
                                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                <span>×</span>
                            
                                </button>
                            </div>';
                            }
                        }
                    }

                    ?>
                    <p class="mb-2 text-gray-700 font-semibold">Name</p>
                    <input class="outline-none border-[1px] border-gray-300 rounded p-2 bg-transparent" type="text" name="name" id="" placeholder="Name" required>
                    <p class="mt-4 mb-2 text-gray-700 font-semibold">Mobile Number</p>
                    <input class="outline-none border-[1px] border-gray-300 rounded p-2 bg-transparent" type="tel" name="mobile" id="" placeholder="Mobile Number" required>
                    <p class="mt-4 mb-2 text-gray-700 font-semibold">Password</p>
                    <input class="outline-none border-[1px] border-gray-300 rounded p-2 bg-transparent" type="password" name="password" id="" placeholder="Create Password" required>
                    <a href="" class="mt-4 text-right mb-2 text-sm text-gray-600 active:text-[#09e5ab]">Already have an
                        account?</a>

                    <!-- <a href="/doctor-register/onboarding-email.html" class="rounded p-3 text-center bg-[#09e5ab] text-white font-semibold text-lg"> -->
                    <button name="submit" class="rounded p-3 text-center bg-[#09e5ab] text-white font-semibold text-lg">SignUp</button>
                    <!-- </a> -->

                </div>
            </form>
        </div>
    </div>

    <?php include 'partials/_footer.php';?>
    
    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
    
    <script src="/reload.js"></script>
</body>

</html>