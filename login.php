<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d6062e77ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
    <title>FinDoc</title>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'partials/_nav.php'; ?>
   

    <div class="flex justify-center items-center space-x-6 m-14">
        <div>
            <img src="/img/loignPage.png" alt="" class="w-[29rem] text-center ">
        </div>

        <div class=" border-[1px] border-gray-300 w-[35%] p-9 rounded">
            <div class="flex flex-row pb-4 justify-between">
                <h2 class="font-bold text-2xl">Login FinDoc</h2>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="flex flex-col ">
                    <p class="mb-2 text-gray-700 font-semibold">Mobile</p>
                    <input class="outline-none border-[1px] border-gray-300 rounded p-2 bg-transparent" type="text" name="mobile" id="" placeholder="mobile No" required>

                    <p class="mt-4 mb-2 text-gray-700 font-semibold">Password</p>
                    <input class="outline-none border-[1px] border-gray-300 rounded p-2 bg-transparent" type="password" name="password" id="" placeholder="Create Password" required>
                    <a href="" class="mt-4 text-right mb-2 text-sm text-gray-600 active:text-[#09e5ab]">Forget
                        Password?</a>

                    <input type="submit" value="Login" name="submit" class="rounded p-3 text-center bg-[#09e5ab] text-white font-semibold text-lg cursor-pointer">
                </div>
            </form>

            <?php
            include 'partials/_connectdb.php';

            if (isset($_POST['submit'])) {
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];

                $patient = "SELECT * FROM `patient_register` where `patient_mobile` = '$mobile' AND `patient_password` = '$password'";
                $patient_match = mysqli_query($conn, $patient);
                $patient_row = mysqli_num_rows($patient_match);

                $doctor = "SELECT * FROM `doctor_register` where `doc_mobile` = '$mobile' AND `doc_password` = '$password'";
                $doctor_match = mysqli_query($conn, $doctor);
                $doctor_row = mysqli_num_rows($doctor_match);

                if ($patient_row) {
                    while ($row = mysqli_fetch_assoc($patient_match)) {
                        $userId = $row['patient_id'];
                        $userName = $row['patient_name'];
                        $userPic = $row['patient_pic'];

                        session_start();

                        $_SESSION['p_id'] = $userId;
                        $_SESSION['p_name'] = $userName;
                        $_SESSION['p_pic'] = $userPic;
                        $_SESSION['p_loggedin'] = true;
                        header('location:patient-dashboard.php');
                    }
                } elseif ($doctor_row) {
                    while ($row = mysqli_fetch_assoc($doctor_match)) {
                        $userId = $row['doc_id'];

                        session_start();

                        $_SESSION['d_id'] = $userId;
                        $_SESSION['d_loggedin'] = true;
                        header('location:doctor-dashboard.php');
                    }
                } else {
                    echo "invalid user OR password";
                }
            }
            ?>

            <div class="mt-6 text-sm flex space-x-1 justify-center items-center">
                <p>Don’t have an account?</p><a href="/patient-register.php" class="text-cyan-500">Register</a>
            </div>
        </div>

    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php';?>

    <script src="/reload.js"></script>
</body>

</html>