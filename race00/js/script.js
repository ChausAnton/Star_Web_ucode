var Memory = 0;

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

    //evalF(str);
    //calc_fact(str);
    //pow(str);
    //sqrtF(str);
    //calcF(nums, signs);
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

function evalF(str) {
    let res = eval(str);
    console.log(res);
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

parsString();