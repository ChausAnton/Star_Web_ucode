var Memory = 0;
var expresion = "";
var j = 0;
var Selected1 = '0';
var Selected2 = '0';

function signsF() {

    let signs = "";
    for(let i of expresion) {
        if(isNaN(i) && i != '.') {
            signs += i;
        }
    }
    return signs;
}

function splitF() {
    j = 0;
    let nums = [[""]];
    for(let i of expresion) {
        if(isNaN(i) && i != '.' && i != '^') {
            nums.push("");
            j++;
        }
        else {
            nums[j] += i;
        }
    }
    return nums;
}

function addSymbol(g) {

    let nums = splitF();

    if(g == '.') {
        if(expresion.length == 0 || nums[j] == ''){
            g = '0.';
        }

        if(nums[j].includes('.')) {
            g = "";
        }
    }

   if(isNaN(g) && g != '.') {
       let index = nums[j].indexOf('.');
       if(index + 1 == nums[j].length) {
            expresion = expresion.slice(0, -1) 
       }
   }

    expresion += g;

    document.querySelector(".main .texta .output").innerHTML = expresion;
}

function pi() {
    expresion = "3.1415";
    document.querySelector(".main .texta .output").innerHTML = expresion;
}

function clearF() {
    expresion = "";
    document.querySelector(".main .texta .output").innerHTML = expresion;
}


function parsString() {
    let str = prompt("input str");

    let signs = "";
    let nums = [[""]];
    let j = 0;
    for(let i of str) {
        if(isNaN(i) && i != '.') {
            signs += i;
            nums.push("");
            j++;
        }
        else {
            nums[j] += i;
        }
    }
}

function MR() {
    Memory = evalF()
    document.querySelector(".main .texta .output").innerHTML = Memory;
}

function MC() {
    Memory = 0;
    document.querySelector(".main .texta .output").innerHTML = Memory;
}

function M_Minus(str) {
    Memory = Memory + evalF()
    document.querySelector(".main .texta .output").innerHTML = Memory;
}

function M_Plus(str) {
    Memory = Memory - evalF()
    document.querySelector(".main .texta .output").innerHTML = Memory;
}

function evalF() {
    pow();
    let res = eval(expresion);
    document.querySelector(".main .texta .output").innerHTML = res;
    document.querySelector(".main .texta .history").innerHTML = expresion;
    expresion = "0";
    return res;
}

function pow() {
    let nums = splitF();
    for(let i of nums) {
        if(i.includes('^')) {
            let res = Math.pow(i.split("^")[0], i.split("^")[1]);
            expresion = expresion.replace(i, res);
        }
    }
}

function sqrtF(str) {
    let nums = splitF();
    let res = Math.sqrt(nums[j]);
    let length = expresion.length;

    expresion = expresion.slice(0, length - nums[j].length);
    expresion += res;
    document.querySelector(".main .texta .output").innerHTML = expresion;
}

function oneX() {
    let nums = splitF();
    let res = 1/nums[j];
    let length = expresion.length;

    expresion = expresion.slice(0, length - nums[j].length);
    expresion += res;
    document.querySelector(".main .texta .output").innerHTML = expresion;
}

function rebuildExp(nums, signs, res) {
    expresion = "";
    for(let i = 0; i < nums.length - 1; i++) {
        expresion += nums[i];
        expresion += signs[i];
    }
    expresion += res;
}

function calc_fact() {
    let nums = splitF();
    let signs = signsF();
    console.log(nums);

    let res = factorial(nums[j])
    rebuildExp(nums, signs, res);
    evalF()
}

function factorial(n) {
    return (n != 1) ? n * factorial(n - 1) : 1;
}


function convert(str) {

    for(let i = 2; i <= 5; i++) {
        document.querySelector(".allconv .convert" + i).className = "convert noactive convert" + i;
    }

    document.querySelector(".allconv ." + str).className = "convert " + str;

}

document.getElementById("m1").addEventListener("change", () => {
    Selected1 = document.getElementById("m1").selectedIndex;
});

document.getElementById("m2").addEventListener("change", () => {
    Selected2 = document.getElementById("m2").selectedIndex;
});

document.getElementById("g1").addEventListener("change", () => {
    Selected1 = document.getElementById("g1").selectedIndex;
    console.log(Selected1);
});

document.getElementById("g2").addEventListener("change", () => {
    Selected2 = document.getElementById("g2").selectedIndex;
    console.log(Selected2);
});