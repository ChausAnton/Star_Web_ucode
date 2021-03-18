
var slideCount = 1;
var timerID = -1;

function showSlide(i) {
    if (slideCount == 1 && i == -1) {
        slideCount = 4;
    } else if (slideCount == 4 && i == 1) {
        slideCount = 1
    } else { slideCount += i }

    let image = document.querySelector(".main_box .image_box .image");
    image.setAttribute("src", "assets/images/super" + slideCount + ".png");

    clearTimeout(timerID);
    timerID = setTimeout(showSlide, 3000, 1);
}


timerID = setTimeout(showSlide, 3000, 1);

document.querySelector(".main_box .left").addEventListener("click", event => {
    showSlide(-1);
});

document.querySelector(".main_box .right").addEventListener("click", event => {
    showSlide(1);
});