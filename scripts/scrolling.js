let arrow = document.getElementById("btn-back-to-top");

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
        arrow.style.display = "block";
    } 
    else {
        arrow.style.display = "none";
    }
}

arrow.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}