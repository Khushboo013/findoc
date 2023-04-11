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
    <link rel="stylesheet" href="style.css">
    <title>FinDoc</title>
</head>

<body class=" bg-[#f9f9f9]">
    <!-- Navigation Bar -->
    <?php include 'partials/_nav.php'; ?>


    <!-- Search Area -->

    <div class="searchArea flex justify-center items-center	 flex-col my-16" id="search">
        <h1 class="font-bold text-5xl ">Search Doctor, Make an Appointment</h1>
        <p class="my-2 text-lg text-[#363a3d]">Discover the best doctors, clinic & hospital the city nearest to you.</p>
        <form action="/search.php" method="post">
            <div class="inputArea flex">
                <div class="location mx-3">
                    <div class="border-2 border-[#09e5ab] flex flex-row py-2 pr-3 rounded-lg bg-white">
                        <img src="/img/location.png" alt="" class="px-2">
                        <input type="text" name="location" id="" placeholder="Search Location" class="outline-none w-52">
                    </div>
                    <p class="text-sm text-[#6c757d]">Based on your Location</p>
                </div>
                <div class="doc">
                    <div class="border-2 border-[#09e5ab] flex flex-row py-2 pr-3 rounded-lg bg-white">
                        <img src="/img/search.png" alt="" class="px-2">
                        <input type="text" name="doctor" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc" class="outline-none w-[30rem]">
                    </div>
                    <p class="text-sm text-[#6c757d]">Ex : Dental or Sugar Check up etc</p>
                </div>
                <div class="searchBtn mx-3">
                    <button name="submit" class=" bg-[#09e5ab] p-3 rounded-lg hover:bg-[#10DEFD]"><img src="/img/search.png" alt="" class=""></button>

                </div>
            </div>
        </form>
        <img src="/img/search-bg.png" alt="">
    </div>

    <!-- what is you looking For -->

    <center class="text-4xl font-bold">What are you looking for?</center>
    <div class="card flex justify-center items-center  space-x-10 my-10 ">

        <figure class="relative max-w-[22.5rem] cursor-pointer overflow-hidden rounded-lg ">
            <img class=" hover:scale-110 transition duration-[0.5s] ease-in-out  " src="/img/doctor.jpg" alt="image description">
            <figcaption class="absolute bottom-6 px-4 text-lg text-white">
                <p class="text-white font-semibold text-2xl shadow-2xl my-2">Visit a Doctor</p>
                <a href="#search">
                    <button class="bg-[#10DEFD] py-2 px-4 rounded-md text-white font-semibold hover:transition hover:ease-in hover:bg-[#01cae4] hover:duration-[0.5s] hover:shadow-2xl ">Book
                        Now</button>
                </a>
                </figcatpion>
        </figure>

        <figure class="relative max-w-[22.5rem] transition-all duration-300 cursor-pointer overflow-hidden rounded-lg ">
            <img class="hover:scale-110 transition duration-[0.5s] ease-in-out  " src="/img/img-pharmacy1.jpg" alt="image description">
            <figcaption class="absolute bottom-6 px-4 text-lg text-white">
                <p class="text-white font-semibold text-2xl shadow-2xl my-2">Find a Pharmacy</p>
                <button class="bg-[#10DEFD] py-2 px-4 rounded-md text-white font-semibold hover:transition hover:ease-in hover:bg-[#01cae4] hover:duration-[0.5s] hover:shadow-2xl ">Coming
                    Soon</button>
                </figcatpion>
        </figure>

        <figure class="relative max-w-[22.5rem] transition-all duration-300 cursor-pointer overflow-hidden rounded-lg  ">
            <img class="hover:scale-110 transition duration-[0.5s] ease-in-out  " src="/img/lab-image.jpg" alt="image description">
            <figcaption class="absolute bottom-6 px-4 text-lg text-white ">
                <p class="text-white font-semibold text-2xl shadow-2xl my-2">Find a Lab</p>
                <button class="bg-[#10DEFD] py-2 px-4 rounded-md text-white font-semibold hover:transition hover:ease-in hover:bg-[#01cae4] hover:duration-[0.5s] hover:shadow-2xl ">Coming
                    Soon</button>
                </figcatpion>
        </figure>
    </div>


    <!-- Clinic and Specialities -->

    <div class="clinic grid place-content-center text-center my-28">
        <h1 class="text-4xl font-bold">Clinic and Specialities</h1>
        <p class="text-lg my-5 px-[28rem]">"We Can’t Help With The Second Certainty in Life, But We Can Delay The First One!"
        </p>
        <form action="/search.php" method="get">
            <div class="carousel flex space-x-28 items-center justify-center my-8">

                <button name="spec" value="Urology" class=" relative focus:outline-none">
                    <div class=" opacity-0 hover:opacity-100 absolute rounded-full  p-10 text-red-700 font-bold bg-cyan-300  transition duration-[0.5s] ease-in-out ">

                        <p class="  text-center  text-sm ">Disorders of the urinary system</p>
                    </div>
                    <div class="rounded-full hover:opacity-0 p-10  shadow-2xl shadow-cyan-500/50  hover:scale-110 transition duration-[0.5s] ease-in-out ">
                        <img src="/img/specialities/specialities-01.png" alt="" class="">
                    </div>
                    <p class="mt-4 font-semibold text-gray-700">Urology</p>
                </button>

                <button name="spec" value="Neurology" class=" relative focus:outline-none">
                    <div class=" opacity-0 hover:opacity-100 absolute rounded-full  p-10 text-red-700 font-bold bg-cyan-300  transition duration-[0.5s] ease-in-out ">

                        <p class="  text-center  text-sm ">Nerves and their diseases</p>
                    </div>
                    <div class="rounded-full  p-10  shadow-2xl shadow-cyan-500/50  hover:scale-110 transition duration-[0.5s] ease-in-out ">
                        <img src="/img/specialities/specialities-02.png" alt="">
                    </div>
                    <p class="mt-4 font-semibold text-gray-700">Neurology</p>
                </button>

                <button name="spec" value="Orthoped" class=" relative focus:outline-none">
                    <div class=" opacity-0 hover:opacity-100 absolute rounded-full  p-10 text-red-700 font-bold bg-cyan-300  transition duration-[0.5s] ease-in-out ">

                        <p class="  text-center  text-sm ">Bone related diseases</p>
                    </div>
                    <div class="rounded-full p-10  shadow-2xl shadow-cyan-500/50  hover:scale-110 transition duration-[0.5s] ease-in-out ">
                        <img src="/img/specialities/specialities-03.png" alt="">
                    </div>
                    <p class="mt-4 font-semibold text-gray-700">Orthoped</p>
                </button>

                <button name="spec" value="Cardiologist" class=" relative focus:outline-none">
                    <div class=" opacity-0 hover:opacity-100 absolute rounded-full  p-10 text-red-700 font-bold bg-cyan-300  transition duration-[0.5s] ease-in-out ">

                        <p class="  text-center  text-sm ">Heart related Desease.</p>
                    </div>
                    <div class="rounded-full p-10  shadow-2xl shadow-cyan-500/50  hover:scale-110 transition duration-[0.5s] ease-in-out ">
                        <img src="/img/specialities/specialities-04.png" alt="">
                    </div>
                    <p class="mt-4 font-semibold text-gray-700">Cardiologist</p>
                </button>
                <button name="spec" value="Dentist" class=" relative focus:outline-none">
                    <div class=" opacity-0 hover:opacity-100 absolute rounded-full  p-8  text-red-700 font-bold bg-cyan-300  transition duration-[0.5s] ease-in-out ">

                        <p class="  text-center  text-sm ">
                            A person who look after people’s teeth</p>
                    </div>
                    <div class="rounded-full p-10  shadow-2xl shadow-cyan-500/50  hover:scale-110 transition duration-[0.5s] ease-in-out ">
                        <img src="/img/specialities/specialities-05.png" alt="">
                    </div>
                    <p class="mt-4 font-semibold text-gray-700">Dentist</p>
                </button>
            </div>
            <!-- </a> -->
        </form>
    </div>


    <!-- Book our doctor  -->

    <?php include 'partials/_doc.php'; ?>


    <!-- Footer -->

    <?php include 'partials/_footer.php'; ?>
</body>

</html>