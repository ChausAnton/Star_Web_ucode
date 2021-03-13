let res = 1;
while(true) {
    let num = prompt("Previous result: " + res + ". Enter a ne number:");

    if(isNaN(num)) {
        console.error("Invalid number!");
        continue;
    }
    num = 1 * num;
    if(num == 56){
        break;
    }
    res += num
    if(res > 10000) {
        res = 1;
    }
}