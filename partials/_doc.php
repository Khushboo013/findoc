<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">

</head>
<style>
    @keyframes carouselAnim {
        from {
            transform: translate(0, 0);
        }

        to {
            transform: translate(calc(-100% + (3*100px)));
        }
    }

    @media only screen and (max-width: 768px) {
        .container .carousel-items {
            animation: carouselAnim 60s infinite alternate linear;
        }

        @keyframes carouselAnim {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(calc(-100% + (5*300px)));
            }
        }
    }

    .carousel-focus:hover {
        transition: all 0.8s;
        transform: scale(1.1);
    }
</style>

<body>
    <div class="book flex space-x-1 justify-between w-full bg-gray-100 px-10 py-20">
        <div class="bookLeft w-[70%] pr-20">
            <h1 class="text-4xl font-bold">Book Our Doctor</h1>
            <h3 class="text-lg text-gray-400 mt-3">God gives life , Doctor save life.</h3>
            <p class="mt-8">May your days be wonderful and healthy Like you make it for others,
            I want to thank you this Doctor Day you are an incarnation of God in others.
            </p>
            <p class="my-2 text-gray-700 font-bold">"The Doctor of the future will give no medicine but will interest his patients in the care of the human frame, in diet and in the case and prevention of disease"</p>
            <p class="my-4 text-red-700 font-bold text-lg">"Medicines cure diseases, but only doctor can cure patients"
            </p>
            <button class="bg-[#10DEFD] mt-3 py-4 px-6 rounded-md text-white font-semibold hover:transition hover:ease-in hover:bg-[#01cae4] hover:duration-[0.5s] hover:shadow-2xl ">Read
                More..</button>
        </div>

        <div class="container  overflow-hidden relative">
            <!-- <div class="w-full h-full absolute"> -->
            <div class="w-1/4 h-full absolute z-50 left-0" style="background: linear-gradient(to right, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
            <div class="w-1/4 h-full absolute z-50 right-0" style="background: linear-gradient(to left, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
            <!-- </div> -->

            <div class="carousel-items space-x-6 flex items-center justify-center" style="width: fit-content; animation: carouselAnim 18s infinite alternate linear;">

                <?php
                include 'partials/_connectdb.php';
                $sql = "SELECT * FROM doctor_register";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['doc_id'];
                    $name = $row['doc_name'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $start_date = $row['availability_date_start'];
                    $end_date = $row['availability_date_end'];
                    $img = $row['doc_pic'];
                    $cost = $row['cost_of_consultation'];
                    $spec = $row['specialisation'];

                    echo '<div class="carousel-focus  flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3 rounded-lg shadow-lg" style="width: 270px;">

                    <div class="rightBook overflow-hidden ">
                        <div class="max-w-[16rem] bg-white rounded-lg shadow-md overflow-hidden  ">

                            <figure class="relative max-w-[22.5rem] h-40 cursor-pointer overflow-hidden rounded-lg ">
                                <a href="#">
                                    <img class=" hover:scale-110 transition duration-[0.5s] ease-in-out  " src="' . $img . '" alt="image description">
                                </a>
                            </figure>

                            <div class="p-2">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-black ">' . $name . '</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">' . $spec . '</p>
                                <div class="rating">

                                    <div class="flex items-center -my-1">
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>First star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Second star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Third star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fourth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fifth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    </div>

                                </div>


                                <ul class="available-info my-3 text-gray-800 text-sm">
                                    <li>
                                        <i class="fas fa-map-marker-alt mr-2"></i>' . $city . ',
                                            ' . $state . '
                                    </li>
                                    <li>
                                        <i class="far fa-clock mr-2"></i> Available from  ' . date("d.m.y", strtotime(str_replace('-', '/', $start_date))) . ' to ' . date("d.m.y", strtotime(str_replace('-', '/', $end_date))) . '
                                    </li>
                                    <li>
                                        <i class="far fa-money-bill-alt mr-2"></i>₹ ' . $cost . '
                                        <i class="fas fa-info-circle" data-bs-toggle="tooltip" title="" data-bs-original-title="Lorem Ipsum" aria-label="Lorem Ipsum"></i>
                                    </li>
                                </ul>
                                <div class="flex justify-center items-center space-x-4">
                                <a href="/doctor/profile.php?id=' . $id . '">
                                    <button class="py-2 px-2  bg-[#10DEFD] rounded-md  text-gray-100 font-semibold hover:bg-teal-300 focus:outline-none">View
                                        Profile</button>
                                </a>
                                <a href="/booking.php?id=' . $id . '">
                                    <button class="py-2 px-2  bg-[#10DEFD] rounded-md  text-gray-100 font-semibold hover:bg-teal-300 focus:outline-none">Book
                                        Now</button>
                                </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>';
                }
                ?>

               

            </div>
        </div>
    </div>

</body>

</html>