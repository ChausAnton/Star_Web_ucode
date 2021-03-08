function func(start, end) {
    let i = start;
    let is_even = false;
    let is_multiple_of3 = false;
    let is_multiple_of10 = false;
    while(i <= end) {
        if(i % 2 == 0) {
            is_even = true;
        }
        if(i % 3 == 0) {
            is_multiple_of3 = true;
        }
        if(i % 10 == 0) {
            is_multiple_of10 = true;
        }
        let answer = i + " ";

        if(is_even == true) {
            answer += "is even";
        }
        if(is_multiple_of3 == true) {
            if(is_even == true) {
                answer += ",";
            }
            else {
                answer += "is"
            }
            answer += " a multiple of 3"
        }
        if(is_multiple_of10 == true) {
            if(is_multiple_of3 == true || is_even == true) {
                answer += ",";
            }
            else {
                answer += "is"
            }
            answer += " a multiple of 10"
        }
        
        if(is_even || is_multiple_of3 || is_multiple_of10) {
            console.log(answer)
        }
        else (
            console.log(i + " -")
        )
        is_even = false;
        is_multiple_of3 = false;
        is_multiple_of10 = false;
        i++;
    }
}


let range = prompt("input range. Example: 1-20");

let start = 1;
let end = 100;
let temp = range.split("-")
if(range && temp[0] && temp[1]) {
    let tmp1 = 1 * temp[0]
    let tmp2 = 1 * temp[1]
    if(tmp1 < tmp2) {
        start = tmp1;
        end = tmp2;
    }
}

func(start, end);
