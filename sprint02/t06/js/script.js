let full_name = prompt("Input firs and last name");

let i = 0;
let space = 1;
let is_clear = true;
while(i < full_name.length) {
    if(isNaN(full_name[i]) == false ) {
        if(full_name[i] == " " && space != 1) {
            console.log("Wrong input!");
            alert("Wrong input!");
            is_clear = false;
            break;
        }
        if(full_name[i] != " " ) {
            console.log("Wrong input!");
            alert("Wrong input!");
            is_clear = false;
            break;
        }
    }
    if((full_name.charCodeAt(i) < 65 || (full_name.charCodeAt(i) >= 91 && 96 >= full_name.charCodeAt(i)) || full_name.charCodeAt(i) >= 123) 
    && full_name.charCodeAt(i) != 32) {
        console.log(full_name.charCodeAt(i))
        console.log("Wrong input!");
        alert("Wrong input!");
        is_clear = false;
        break;
    }
    if(full_name[i] == " ") {
        space--;
    }
    i++;
}

if(is_clear != false) {
    let index = full_name.indexOf(" ");
    if(index != -1) {
        let temp = full_name.split(" ");
        if(temp[0] && temp[1]) {
            console.log("Greetings, " + temp[0].charAt(0).toUpperCase() + temp[0].slice(1) + " " +
            + temp[1].charAt(0).toUpperCase() + temp[1].slice(1) + "!");
            alert("Greetings, " + temp[0].charAt(0).toUpperCase() + temp[0].slice(1) + " " +
            temp[1].charAt(0).toUpperCase() + temp[1].slice(1) + "!" );
        }
        else {
            console.log("Wrong input!");
            alert("Wrong input!");
        }
    }
    else {
        console.log("Wrong input!");
        alert("Wrong input!");
    }
}
