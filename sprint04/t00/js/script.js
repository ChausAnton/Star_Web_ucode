function transformation() {
    let test = document.getElementById("hero");
    if(test != null) {
        document.getElementById("hero").id = "hulk";
        document.getElementById("hulk").style.font = "130px 'Bowlby One', cursive";
        document.getElementById("hulk").style.letterSpacing = "6px"
        document.getElementById("hulk").textContent = "Hulk"
        document.getElementById("lab").style.background = "#70964b"
    }
    else {
        document.getElementById("hulk").id = "hero";
        document.getElementById("hero").style.font = "60px 'Bowlby One', cursive"
        document.getElementById("hero").style.letterSpacing = "2px"
        document.getElementById("hero").textContent = 'Bruce Banner';
        document.getElementById("lab").style.background = "#ffb300"
    }
}
