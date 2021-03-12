String.prototype.removeDuplicates = function () {
    let res = "";
    for(let i of this.split(' ')) {
        if(res.split(' ').indexOf(i) == -1) {
            res += i + " ";
        }
    }
    return res
}

let str = "Giant Spiders?   What’s next? Giant Snakes?";
console.log(str);
// Giant Spiders?   What’s next? Giant Snakes?
str = str.removeDuplicates();
console.log(str);
// Giant Spiders? What’s next? Snakes?
str = str.removeDuplicates();
console.log(str);
// Giant Spiders? What’s next? Snakes?
str = ". . . . ? . . . . . . . . . . . ";
console.log(str);
// . . . . ? . . . . . . . . . . .
str = str.removeDuplicates();
console.log(str);
//.?