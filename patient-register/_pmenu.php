<?php

echo '<div class="mt-16 w-[23%] left-96 fixed">
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
            <button class="mt-2 bg-[#eef3f1] w-9 h-9 rounded-full  text-black">3</button>
            <a href="/patient-register/patient-details.php" class="space-y-1">
                <h2 class="font-bold ">Personal Details</h2>
                <p class="text-sm">Enter Your Personal Details</p>
            </a>

        </li>

    </ul>
</div>';


?>