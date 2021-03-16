document.querySelector(".stone1").addEventListener("click", event => {
    document.querySelector(".stone1").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone1');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone2").addEventListener("click", event => {
    document.querySelector(".stone2").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone2');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone3").addEventListener("click", event => {
    document.querySelector(".stone3").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone3');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});
document.querySelector(".stone4").addEventListener("click", event => {
    document.querySelector(".stone4").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone4');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone5").addEventListener("click", event => {
    document.querySelector(".stone5").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone5');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});
document.querySelector(".stone6").addEventListener("click", event => {
    document.querySelector(".stone6").setAttribute("style", "border: none;")
    let obg = document.getElementById('stone6');
    obg.onmousedown = function(e) {
        onclick(e, obg);
    };
    obg.ondragstart = function() {
        return false;
    };
});



function onclick(e, obg) {
    var coords = getCoords(obg);
    var shiftX = e.pageX - coords.left;
    var shiftY = e.pageY - coords.top;

    obg.style.position = 'absolute';
    document.body.appendChild(obg);
    moveAt(e);

    obg.style.zIndex = 1000; // над другими элементами

    function moveAt(e) {
        obg.style.left = e.pageX - shiftX + 'px';
        obg.style.top = e.pageY - shiftY + 'px';
    }

    document.onmousemove = function(e) {
        moveAt(e);
    };

    obg.onmouseup = function() {
        document.onmousemove = null;
        obg.onmouseup = null;
    };
}

function getCoords(elem) { // кроме IE8-
    var box = elem.getBoundingClientRect();
    return {
        top: box.top + pageYOffset,
        left: box.left + pageXOffset
    };
}