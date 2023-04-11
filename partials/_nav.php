<!-- Navigation Bar -->
<?php
if ((isset($_SESSION['p_loggedin']) && $_SESSION['p_loggedin'] == true)||(isset($_SESSION['d_loggedin']) && $_SESSION['d_loggedin'] == true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}

echo '
<div class="nav flex  justify-between py-2 px-9 bg-gray-50 border-b-[1px]">
    <div class="left flex">
        <a href="/">
            <p class="font-bold text-[2.1rem] my-1 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                FinDoc.</p>
        </a>
        <ul class="flex space-x-8 mx-7 my-5">
            <li class="hover:text-[#10DEFD]"><a href="/">Home</a></li>
            <li class="hover:text-[#10DEFD]"><a href="/doctor-dashboard.php">Doctors</a></li>
            <li class="hover:text-[#10DEFD]"><a href="/patient-dashboard.php">Patients</a></li>
            <li class="hover:text-[#10DEFD]"><a href="#">About</a></li>
            <li class="hover:text-[#10DEFD]"><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="right my-3">';

if (!$loggedin) {
    echo ' <a href="/login.php">
    <button
    class="btn relative inline-flex items-center justify-start overflow-hidden transition-all bg-white rounded hover:bg-white group">
    <span
        class="w-0 h-0 rounded bg-[#09e5ab] absolute top-0 left-0 ease-out duration-500 transition-all group-hover:w-full group-hover:h-full -z-1"></span>
    <span
        class="w-full px-4 py-3 text-sm font-semibold rounded-md text-[#09e5ab] border-2 border-[#09e5ab] transition-colors duration-300 ease-in-out group-hover:text-white z-10">
        LOGIN/SIGNUP
    </span>
</button>
        </a>';
}
if ($loggedin) {
    echo ' <a href="/logout.php">
    <button
    class="btn relative inline-flex items-center justify-start overflow-hidden transition-all bg-white rounded hover:bg-white group">
    <span
        class="w-0 h-0 rounded bg-[#09e5ab] absolute top-0 left-0 ease-out duration-500 transition-all group-hover:w-full group-hover:h-full -z-1"></span>
    <span
        class="w-full px-4 py-3 text-sm font-semibold rounded-md text-[#09e5ab] border-2 border-[#09e5ab] transition-colors duration-300 ease-in-out group-hover:text-white z-10">
        LOGOUT
    </span>
</button>
        </a>';
}


echo '</div>
</div>';

?>