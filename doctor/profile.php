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
    <?php include '../partials/_nav.php'; ?>

    <!-- DASHBOARD -->

    <div class="bg-[#0d6efd]">
        <p class="text-white text-sm pt-4 px-9"><a href="/">Home</a> <span>/</span> Doctor profile</p>
        <p class="text-white font-bold text-xl pb-4 px-9">Doctor Profile</p>
    </div>



    <!-- ---- DOctor profile------------------>

    <?php
    include '../partials/_connectdb.php';

    $d_id = $_GET['id'];
    $sql = "SELECT * FROM doctor_register WHERE doc_id = $d_id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['doc_name'];
        $spec = $row['specialisation'];
        $city = $row['city'];
        $address = $row['address'];
        $state = $row['state'];
        $cost = $row['cost_of_consultation'];
        $img = $row['doc_pic'];
        $id = $row['doc_id'];
        $about = $row['about'];
        $start_date = $row['availability_date_start'];
        $end_date = $row['availability_date_end'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $days = $row['week_days'];


        echo ' <div class="my-7 flex flex-col mx-28">
                <div class=" flex  rounded-md border-[1px] border-gray-200 px-8 py-9">
                    <div class="">
                        <img src="' . $img . '" alt="" class="h-40 w-40 rounded-md">
                    </div>
                    <div class="flex w-full justify-between">
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
        
                            <a href="/booking.php?id=' . $id . '" class="bg-[#01cae4] mt-4 py-2 px-24 rounded-md text-center text-white  font-semibold hover:transition hover:ease-in hover:bg-[#20def8]  ">
                                <button class=" uppercase  text-sm">
                                    Book
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
    }
    ?>


    <!-- <div class="my-7 flex flex-col mx-28">
        <div class=" flex  rounded-md border-[1px] border-gray-200 px-8 py-9">
            <div class="">
                <img src="'.$img.'" alt="" class="h-40 w-40 rounded-md">
            </div>
            <div class="flex w-full justify-between">
                <div class="ml-4 mt-3">
                    <a href="">
                        <p class="font-semibold text-xl text-[#01cae4] mb-1">
                            <span>Dr. </span>'.$name.'
                        </p>
                    </a>
                    <p class="text-gray-600 text-sm">'.$spec.'</p>
                    <p class="text-gray-600 text-sm mt-4"><i class="fa-solid fa-user-doctor mr-2"></i>Dentist
                    </p>
                    <p class="text-gray-600 text-sm mt-1"><i class="mr-2 fa-solid fa-location-dot"></i>'.$city.',
                        '.$state.'</p>

                </div>

                <div class="grid place-content-center ">
                    <p class="text-gray-800 text-sm mt-1 mb-2"><i class="mr-2 fa-solid fa-location-dot"></i>
                        '.$city.',
                        '.$state.'</p>
                    <p class="text-gray-800 text-sm mt-1"><i class="fa-solid fa-money-bill-1-wave mr-2"></i>
                        <span>₹</span> '.$cost.'
                    </p>

                    <a href="/booking.php?id='.$id.'" class="bg-[#01cae4] mt-4 py-2 px-24 rounded-md text-center text-white  font-semibold hover:transition hover:ease-in hover:bg-[#20def8]  ">
                        <button class=" uppercase  text-sm">
                            Book
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="rounded-md border-[1px] border-gray-200  pb-9 mx-28 my-7">
        <div>
            <div class="flex justify-around w-full">
                <button class="btn overview px-28 py-6 font-bold text-cyan-500 border-b-2 border-b-cyan-500 hover:text-cyan-500  hover:border-b-2 hover:border-cyan-500 ">
                    Overview</button>

                <button class="btn location px-28 py-6 text-gray-700 font-bold hover:text-cyan-500 hover:border-b-2 hover:border-cyan-500">
                    Location</button>

                <button class="btn review px-28 py-6 text-gray-700 font-bold hover:text-cyan-500 hover:border-b-2 hover:border-cyan-500">
                    Reviews</button>

                <button class="btn workHour px-28 py-6 text-gray-700 font-bold hover:text-cyan-500 hover:border-b-2 hover:border-cyan-500">Working
                    Hours</button>
            </div>
            <hr>
        </div>


        <div class="mx-7" id="tab1">
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">About Me</p>
                <p class="mt-2"><?php echo $about; ?></p>
            </div>
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">Specializations</p>
                <p class="mt-2"><?php echo $spec; ?></p>
            </div>
        </div>

        <div class="mx-7 hidden" id="tab2">
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">Address</p>
                <p class="mt-2"><?php echo $address; ?></p>
            </div>
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">City</p>
                <p class="mt-2"><?php echo $city; ?></p>
            </div>
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">State</p>
                <p class="mt-2"><?php echo $state; ?></p>
            </div>
        </div>


        <!-- Reviewsss .....by......patients -->
        <div class="mx-7 hidden" id="tab3">
            <form action="" method="post">
                <div class="mt-7">
                    <p class="text-gray-700 font-bold text-lg"> Write a review for Dr. <?php echo $name; ?></p>
                    <p class="text-gray-700 font-semibold text-lg mt-7">Title of your review</p>

                    <input type="text" class="border-[1px] border-gray-200 w-full outline-none px-3 py-2 mt-2 rounded-md" placeholder="write in one sentence..." name="title">

                    <p class="text-gray-700 font-semibold text-lg mt-7">Your review</p>

                    <textarea name="content" id="" cols="30" rows="4" class="border-[1px] border-gray-200 w-full outline-none px-3 py-2 mt-2 rounded-md"></textarea>
                </div>

                <div class="mt-5">
                    <a href="" class="bg-[#01cae4] py-2 px-6 rounded-md text-center text-white  font-semibold hover:transition hover:ease-in hover:bg-[#20def8]  ">
                        <button class=" text-sm" name="submit">
                            Add Review
                        </button>
                    </a>
                </div>

            </form>

            <!-- add reviews......... -->
            <?php
            include '../partials/_connectdb.php';

            $d_id = $_GET['id'];

            if (!isset($_SESSION['p_loggedin']) || $_SESSION['p_loggedin'] != true) {
                echo '<a href ="/login.php" class = ""><p class = "mt-8 text-cyan-700 hover:text-cyan-300"><b>Logged In to Review</b></p></a>';
        
            } else {
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $review_by =  $_SESSION['p_name'];
                    $review_p_id =  $_SESSION['p_id'];
                    $review_avatar =  $_SESSION['p_pic'];

                    $sql = "INSERT INTO `review` (`title`, `content`, `review_by`, `review_avatar`, `review_doc_id`, `review_p_id`, `date`) VALUES ('$title', '$content', '$review_by', '$review_avatar', '$d_id', '$review_p_id', current_timestamp())";

                    $result = mysqli_query($conn, $sql);
                }
            }

            ?>

            <!-- reviews..display.................. -->

            <div class="mt-10 mx-7">

                <?php
                // $noComments = true;
                // $id = $_GET['threadid'];
            $d_id = $_GET['id'];

                $sql = "SELECT * FROM `review` where review_doc_id = $d_id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    // $noComments = false;

                    // $comment_id = $row['comment_id'];
                    $title =  $row['title'];
                    $content =  $row['content'];
                    $review_avatar = $row['review_avatar'];
                    $review_by =  $row['review_by'];
                    $date = $row['date'];

                    echo ' <hr class="my-8 mt-16">
                    <div class="flex mt-6">
                        <img src="' . $review_avatar . '" alt="" class="w-12 h-12 rounded-full">
    
                        <div class="ml-4">
                            <p class="font-bold">' . $review_by . '</p>
                            <p class="text-sm text-gray-600">Reviewed on <span>' . date("l jS \of F Y h:i:s A", strtotime(str_replace('-', '/', $date))) . '</span></p>
                            <p class="mt-2">' . $content . '</p>
                        </div>
                    </div>';
                }
                //     if ($noComments) {
                //         echo '<div class="jumbotron jumbotron-fluid container">
                //     <div class="container">
                //       <p class="display-4">No Answer</p>
                //       <p class="lead">Be the first to comment.</p>
                //     </div>
                //   </div>';
                //     }




                ?>

                <!-- <hr class="my-8 mt-16">
                <div class="flex mt-6">
                    <img src="/img/doctor.jpg" alt="" class="w-12 h-12 rounded-full">

                    <div class="ml-4">
                        <p class="font-bold">Heralal</p>
                        <p class="text-sm text-gray-600">Reviewed on <span> 10-10-29</span></p>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia consequatur cumque pariatur, reiciendis sit animi laborum sapiente maiores? Aspernatur maiores voluptates, odit sit iste reiciendis. In, illum asperiores, accusantium assumenda nihil molestiae magni alias, exercitationem obcaecati omnis quisquam repudiandae distinctio.</p>
                    </div>
                </div> -->


            </div>
        </div>

        <div class="mx-7 hidden" id="tab4">
            <div class="mt-7">
                <p class="text-gray-700 font-bold text-lg">Availability</p>
                <p class="text-gray-500 font-bold text-lg mt-4">Date</p>

                <p class="mt-2">From <span class=" text-cyan-400 font-semibold"><?php echo date("jS  M Y", strtotime(str_replace('-', '/', $start_date))); ?></span> to <span class=" text-cyan-400 font-semibold"><?php echo date("jS  M Y", strtotime(str_replace('-', '/', $end_date))); ?></span> On <span class="text-cyan-400 font-semibold"><?php echo $days; ?></span> </p>

                <p class="text-gray-500 font-bold text-lg mt-4">Time</p>

                <p class="mt-2">From <span class=" text-cyan-400 font-semibold"><?php echo date("g:i A", strtotime(str_replace('-', '/', $start_time))); ?></span> to <span class=" text-cyan-400 font-semibold"><?php echo date("g:i A", strtotime(str_replace('-', '/', $end_time))); ?></span> </p>
            </div>
        </div>

    </div>




    <!-- Footer -->

    <?php include '../partials/_footer.php'; ?>

    <script src="/doctor/buttons.js"></script>
    <script src="/reload.js"></script>


</body>

</html>