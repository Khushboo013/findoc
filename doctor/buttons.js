 // Feature buttons.....
 (function () {
    let buttons = document.querySelectorAll(".btn");
    let tab1 = document.querySelector("#tab1");
    let tab2 = document.querySelector("#tab2");
    let tab3 = document.querySelector("#tab3");
    let tab4 = document.querySelector("#tab4");
    let overview = document.querySelector(".overview");
    let location = document.querySelector(".location");
    let review = document.querySelector(".review");
    let workHour = document.querySelector(".workHour");

    buttons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            if (button.classList.contains("overview")) {
                overview.classList.add("text-cyan-500", "border-b-2", "border-b-cyan-500");
                location.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                review.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                workHour.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");

                tab1.style.display = "block";
                tab2.style.display = "none";
                tab3.style.display = "none";
                tab4.style.display = "none";
            }
            if (button.classList.contains("location")) {
                location.classList.add("text-cyan-500", "border-b-2", "border-b-cyan-500");
                overview.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                review.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                workHour.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");

                tab1.style.display = "none";
                tab2.style.display = "block";
                tab3.style.display = "none";
                tab4.style.display = "none";
            }
            if (button.classList.contains("review")) {
                review.classList.add("text-cyan-500", "border-b-2", "border-b-cyan-500");
                location.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                overview.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                workHour.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");

                tab1.style.display = "none";
                tab2.style.display = "none";
                tab3.style.display = "block";
                tab4.style.display = "none";

            }
            if (button.classList.contains("workHour")) {
                workHour.classList.add("text-cyan-500", "border-b-2", "border-b-cyan-500");
                location.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                review.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");
                overview.classList.remove("text-cyan-500", "border-b-2", "border-b-cyan-500");

                tab1.style.display = "none";
                tab2.style.display = "none";
                tab3.style.display = "none";
                tab4.style.display = "block";
            }
        });
    })
})();
