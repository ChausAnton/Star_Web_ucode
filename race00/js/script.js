String.prototype.replaceAt = function (index, char) {
    if(char=='') {
        return this.slice(0,index)+this.substr(index+1 + char.length);
    } else {
        return this.substr(0, index) + char + this.substr(index + char.length);
    }
}

var Memory = 0;
var expresion = "";

function addSymbol(g) {

    let nums = [[""]];
    let j = 0;

    for(let i of expresion) {
        if(isNaN(i) && i != '.') {
            nums.push("");
            j++;
        }
        else {
            nums[j] += i;
        }
    }

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

function MR(str) {
    Memory = str;
}

function MC() {
    Memory = 0;
}

function M_Minus(str) {
    Memory -= str;
}

function M_Plus(str) {
    Memory += str;
}

function evalF() {
    let res = eval(expresion);
    document.querySelector(".main .texta .output").innerHTML = res;
    document.querySelector(".main .texta .history").innerHTML = expresion;
}

function pow(nums) {
    nums = nums.split("^");
    let res = Math.pow(nums[0], nums[1]);
    console.log(res);

}

function sqrtF(str) {
    let res = Math.sqrt(str);
    console.log(res);
}

function calc_fact(num) {
    let res = factorial(num)
    console.log(res);
}

function factorial(n) {
    return (n != 1) ? n * factorial(n - 1) : 1;
}

/*function calcF(nums, signs) {

    let res = 0;
    for(let i of signs) {
        res = Calc.calculate(nums[0] + i + nums[1]);
        nums = nums.slice(1, 2);
        nums = nums.slice(1);
        nums[0] = res;
    }
    console.log(res);

}*/
