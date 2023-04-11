<?php
session_start();
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

    <div class="bg-[#0d6efd]">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Search</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Results :
            <!-- <?php echo $_GET["doctor"] . ' in ' . $_GET["location"]; ?></p> -->
    </div>

    <div class="flex ">
        <div class=" w-96 mx-7 my-7 min-h-full ">
            <div class="sticky top-7 border-[1px] border-gray-300 rounded-md">
                <div class="font-semibold text-xl py-3 border-b border-gray-200 ">
                    <p class="ml-8">Search Filter</p>
                </div>
                <form action="/search.php" method="post">

                    <div class="ml-8 my-4">
                        <p class="font-semibold text-lg">Gender</p>
                        <div class="flex mt-2 text-gray-600">
                            <input type="checkbox" name="gender" id="" class="mr-2 h-4 w-5 cursor-pointer" value="male">
                            <p class="-mt-1 cursor-pointer">Male Doctor</p>
                        </div>
                        <div class="flex mt-2 text-gray-600">
                            <input type="checkbox" name="gender" id="" class="mr-2 h-4 w-5 cursor-pointer" value="female">
                            <p class="-mt-1 cursor-pointer">Female Doctor</p>
                        </div>
                    </div>


                    <div class="ml-8 my-8">
                        <p class="font-semibold text-lg">Select Specialist</p>
                        <div class="flex mt-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="spec" id="" class="mr-2 h-4 w-5 cursor-pointer" value="Urology">
                            <p class="-mt-1">Urology</p>
                        </div>
                        <div class="flex mt-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="spec" id="" class="mr-2 h-4 w-5 cursor-pointer" value="Neurology">
                            <p class="-mt-1">Neurology</p>
                        </div>
                        <div class="flex mt-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="spec" id="" class="mr-2 h-4 w-5 cursor-pointer" value="Dentist">
                            <p class="-mt-1">Dentist</p>
                        </div>
                        <div class="flex mt-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="spec" id="" class="mr-2 h-4 w-5 cursor-pointer" value="Orthopedic">
                            <p class="-mt-1">Orthopedic</p>
                        </div>
                        <div class="flex mt-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="spec" id="" class="mr-2 h-4 w-5 cursor-pointer" value="Cardiologist">
                            <p class="-mt-1">Cardiologist</p>
                        </div>
                    </div>
                    <a href="" class="grid place-content-center mb-6">
                        <button name="submit" class="px-36 py-3 text-white font-bold rounded-md bg-[#01cae4] hover:transition hover:ease-in hover:bg-[#20def8] hover:duration-[0.5s] hover:shadow-2xl ">Search</button>
                    </a>
                </form>
            </div>
        </div>


        <!-- ---- Book DOctor------------------>



        <div>

            <?php
            include 'partials/_connectdb.php';

            $output = false;
            $get_doc = false;
            $get_gender = false;
            $get_spec = false;

            if (isset($_POST['submit'])) {
                $loc = $_POST["location"];
                $doc = $_POST["doctor"];
               


                if ($loc != "") {
                    
                    $sql = "SELECT * FROM doctor_register WHERE `address` LIKE '%$loc%' OR `city` LIKE '%$loc%' OR `state` LIKE '%$loc%'";

                    $result = mysqli_query($conn, $sql);
                    // $output = true;
                }
                if ($doc != "") {
                    // $doc = $_GET["doctor"];
                    $get_doc = true;
                    $sql = "SELECT * FROM doctor_register WHERE `about` LIKE '%$doc%' OR `specialisation` LIKE '%$doc%' OR `doc_name` LIKE '%$doc%'";
                   
                    $result = mysqli_query($conn, $sql);
                    
                }
                
            }
            // }
            else {
                echo "search for getting results";
            }

            if ($result) {
                // $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['doc_name'];
                    $spec = $row['specialisation'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $cost = $row['cost_of_consultation'];
                    $img = $row['doc_pic'];
                    $id = $row['doc_id'];


                    echo '<div>
                         <div class="my-7 flex flex-col">
                            <div class=" flex  rounded-md border-[1px] border-gray-200 px-8 py-9">
                                <div class="">
                                    <img src="' . $img . '" alt="" class="h-40 w-40 rounded-md">
                                </div>
                                <div class="flex w-[800px] justify-between">
                                    <div class="ml-4 mt-3">
                                        <a href="">
                                            <p class="font-semibold text-xl text-[#01cae4] mb-1">
                                                <span>Dr. </span>' . $name . '
                                            </p>
                                        </a>
                                        <p class="text-gray-600 text-sm">' . $spec . '</p>
                                        <p class="text-gray-600 text-sm mt-4"><i class="fa-solid fa-user-doctor mr-2"></i>' . $spec . '
                                        </p>
                                        <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-location-dot"></i>' . $city . ',
                                        ' . $state . '</p>

                                    </div>

                                    <div class="grid place-content-center ">
                                        <p class="text-gray-800 text-sm mt-1 mb-2"><i class="mr-2 fa-solid fa-location-dot"></i>
                                        ' . $city . ',
                                        ' . $state . '</p>
                                        <p class="text-gray-800 text-sm mt-1"><i class="fa-solid fa-money-bill-1-wave mr-2"></i>
                                            <span>₹</span> ' . $cost . '
                                            </p>
                                        <a href="/doctor/profile.php?id=' . $id . '">
                                            <button class="text-[#01cae4] mt-3 py-2 px-7 rounded-md border-2 border-[#10DEFD]  font-semibold hover:transition hover:ease-in hover:bg-[#01cae4] hover:text-white  uppercase  text-sm">
                                                    View Profile
                                                </button>
                                            </a>
                                        <a href="/booking.php?id=' . $id . '" class="bg-[#01cae4] mt-3 py-2 px-7 rounded-md text-center text-white  font-semibold hover:transition hover:ease-in hover:bg-[#20def8]  ">
                                            <button class=" uppercase  text-sm">
                                                    Book
                                            </button>
                                         </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>




        </div>
    </div>



    <!-- Footer -->

    <?php include 'partials/_footer.php'; ?>

</body>

</html>