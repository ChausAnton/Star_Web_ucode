
document.querySelector(".stone1").addEventListener("click", event => {
    document.querySelector(".stone1").setAttribute("class", "stone1" + " stone");
    let obg = document.getElementById('stone1');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone1_not")) {
            onclick(e, obg, 'stone1');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone2").addEventListener("click", event => {
    document.querySelector(".stone2").setAttribute("class", "stone2" + " stone");
    let obg = document.getElementById('stone2');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone2_not")) {
            onclick(e, obg, 'stone2');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone3").addEventListener("click", event => {
    document.querySelector(".stone3").setAttribute("class", "stone3" + " stone");
    let obg = document.getElementById('stone3');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone3_not")) {
            onclick(e, obg, 'stone3');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});
document.querySelector(".stone4").addEventListener("click", event => {
    document.querySelector(".stone4").setAttribute("class", "stone4" + " stone");
    let obg = document.getElementById('stone4');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone4_not")) {
            onclick(e, obg , 'stone4');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone5").addEventListener("click", event => {
    document.querySelector(".stone5").setAttribute("class", "stone5" + " stone");
    let obg = document.getElementById('stone5');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone5_not")) {
            onclick(e, obg, 'stone5');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});

document.querySelector(".stone6").addEventListener("click", event => {
    document.querySelector(".stone6").setAttribute("class", "stone6" + " stone");
    let obg = document.getElementById('stone6');
    obg.style.border = 'none';
    obg.onmousedown = function(e) {
        if(!document.querySelector(".stone6_not")) {
            onclick(e, obg, 'stone6');
        }
    };
    obg.ondragstart = function() {
        return false;
    };
});



function onclick(e, obg, obg_class) {
    var coords = getCoords(obg);
    var startX = e.clientX;
    var startY = e.clientY;

    var shiftX = e.pageX - coords.left;
    var shiftY = e.pageY - coords.top;

    obg.style.position = 'absolute';
    document.body.appendChild(obg);
    moveAt(e);

    obg.style.zIndex = 1000;

    function moveAt(e) {
        obg.style.left = e.pageX - (shiftX - 16.6) + 'px';
        obg.style.top = e.pageY - (shiftY - 16.6) + 'px';
    }

    document.onmousemove = function(e) {
        moveAt(e);
    };


    obg.onmouseup = function(event) {
        document.onmousemove = null;
        obg.onmouseup = null;
        let fX = event.clientX;
        let fY = event.clientY;

        if(Math.sqrt((startX - fX) * (startX - fX) + (startY - fY) * (startY - fY)) < 10) {
            obg.style.border = '2px solid black';
            obg.setAttribute("class", obg_class + " stone " + obg_class + "_not");
        }

    };
}

function getCoords(elem) { // кроме IE8-
    var box = elem.getBoundingClientRect();
    return {
        top: box.top + pageYOffset,
        left: box.left + pageXOffset
    };
}