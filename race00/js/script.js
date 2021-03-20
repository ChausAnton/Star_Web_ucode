var Memory = 0;
var expresion = "";
var j = 0;
var Selected1 = '0';
var Selected2 = '0';
var hex = "-1";
var dec = "1";
var bin = "-1";

function toHex() {
    expresion = "";
    document.querySelector(".main .texta .output").innerHTML = expresion;
    document.querySelector(".main .texta .history").innerHTML = expresion;

    document.querySelector(".main .grid-container .hex").setAttribute("class", "hex active");
    hex = "1";
    
    document.querySelector(".main .grid-container .dec").setAttribute("class", "dec");
    dec = '-1';

    document.querySelector(".main .grid-container .bin").setAttribute("class", "bin");
    bin = "-1";

    for(let i = 1; i < 5; i++) {
        document.querySelector(".allconv .convert" + i).className = "convert noactive convert" + i;
    }

    document.querySelector(".allconv .convert2").className = "convert convert2";

    for(let i = 0; i < 27; i++) {
        document.getElementById('i' + i).disabled = false;
    }

    for(let i = 15; i < 27; i++) {
        document.getElementById('i' + i).disabled = true
    }

    document.getElementById('i' + 17).disabled = false;
}

function toDec() {
    expresion = "";
    document.querySelector(".main .texta .output").innerHTML = expresion;
    document.querySelector(".main .texta .history").innerHTML = expresion;

    document.querySelector(".main .grid-container .hex").setAttribute("class", "hex");
    hex = "-1";
    
    document.querySelector(".main .grid-container .dec").setAttribute("class", "dec active");
    dec = '1';

    document.querySelector(".main .grid-container .bin").setAttribute("class", "bin");
    bin = "-1";

    for(let i = 1; i < 5; i++) {
        document.querySelector(".allconv .convert" + i).className = "convert noactive convert" + i;
    }

    for(let i = 0; i < 27; i++) {
        document.getElementById('i' + i).disabled = false;
    }
    document.getElementById('i' + 17).disabled = false;

}

function toBin() {
    expresion = "";
    document.querySelector(".main .texta .output").innerHTML = expresion;
    document.querySelector(".main .texta .history").innerHTML = expresion;

    document.querySelector(".main .grid-container .hex").setAttribute("class", "hex");
    hex = "-1";
    
    document.querySelector(".main .grid-container .dec").setAttribute("class", "dec");
    dec = '-1';

    document.querySelector(".main .grid-container .bin").setAttribute("class", "bin active");
    bin = "1";

    for(let i = 1; i < 5; i++) {
        document.querySelector(".allconv .convert" + i).className = "convert noactive convert" + i;
    }

    for(let i = 0; i < 27; i++) {
        document.getElementById('i' + i).disabled = false;
    }

    for(let i = 2; i < 10; i++) {
        document.getElementById('i' + i).disabled = true
    }

    for(let i = 15; i < 27; i++) {
        document.getElementById('i' + i).disabled = true
    }
    document.getElementById('i' + 17).disabled = false;
}

function signsF() {

    let signs = "";
    for(let i of expresion) {
        if(isNaN(i) && i != '.' && !(/[a-zA-Z]/).test(i)) {
            signs += i;
        }
    }
    return signs;
}

function splitF() {
    j = 0;
    let nums = [[""]];
    for(let i of expresion) {
        if(isNaN(i) && i != '.' && i != '^' && !(/[a-zA-Z]/).test(i)) {
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
    let nums = splitF();
    let signs = signsF();

    let newStr = "";
    for(let i = 0; i < nums.length; i++) {
        if(hex == '1') {
            newStr += '' + parseInt(nums[i], 16);
        }
        else if(bin == '1') {
            newStr += '' + parseInt(nums[i], 2);
        }
        else {
            newStr += nums[i];
        }
        if(nums.length - 1 > i) {
            newStr += signs[i];
        }
    }

    pow();
    let res = '' + eval(newStr);
    if(hex == '1') {
        res = res.toString(16);
    }
    else if(bin == '1') {
        res = res.toString(2);
    }

    document.querySelector(".main .texta .output").innerHTML = res;
    document.querySelector(".main .texta .history").innerHTML = expresion;
    expresion = res;
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

    for(let i = 2; i < 5; i++) {
        document.querySelector(".allconv .convert" + i).className = "convert noactive convert" + i;
    }

    document.querySelector(".allconv ." + str).className = "convert " + str;
    Selected1 = "0"
    Selected2 = "0"
}

function ConverFin(str) {
    if(str == '1') {
        let num = document.getElementById('number1').value
        if(Selected1 < Selected2) {
            num = (num / 100) / 1000;
            if(Selected1 == 1) {
                num *= 100;
            }
            else if(Selected2 == 1) {
                num *= 1000;
            }
        }
        if(Selected1 > Selected2) {
            num = (num * 100) * 1000;
            if(Selected2 == 1) {
                num /= 100;
            }
            else if(Selected1 == 1) {
                num /= 1000;
            }
        }
        document.querySelector(".allconv .convert3 .output1").value = num;
    }
    else {
        let num = document.getElementById('number2').value
        if(Selected1 < Selected2) {
            num = (num / 1000) / 1000;
            if(Selected1 == 1) {
                num *= 1000;
            }
            else if(Selected2 == 1) {
                num *= 1000;
            }
        }
        if(Selected1 > Selected2) {
            num = (num * 1000) * 1000;
            if(Selected2 == 1) {
                num /= 1000;
            }
            else if(Selected1 == 1) {
                num /= 1000;
            }
        }
        document.querySelector(".allconv .convert4 .output2").value = num;
    }
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

