function addToStorage() {
    let inputNode = document.getElementById("input_");
    let value = inputNode.value.trim();
    
    let i = 0;
    while(localStorage.getItem("input_" + i)) {
        i++;
    }

    let date = new Date();
    date.getTime();
    let year = date.getFullYear();
    let month = "" + (date.getMonth() + 1);
    let date_ = "" + date.getDate();
    let hours = "" + date.getHours();
    let minutes = "" + date.getMinutes();
    let sec = "" + date.getSeconds();
    
    if(month.length < 2) {
        month = "0" + String(month)
    }
    if(date_.length < 2) {
        date_ = "0" + String(date_)
    }
    if(hours.length < 2) {
        hours = "0" + String(hours)
    }
    if(minutes.length < 2) {
        minutes = "0" + String(minutes)
    }

    datestr = date_ + "." + month + "." + year + ", " + hours + ":" + minutes + ":" + sec

    localStorage.setItem("input_" + i, "--> " + value + " [" + datestr + "]" + "<br>");
    document.querySelector(".main_box .output_fields .output_field .out_data .data").innerHTML += localStorage.getItem("input_" + i);
}

function clearStorage() {
    localStorage.clear();
    displayStorage();
}

function displayStorage() {
    let i = 0;
    if(!localStorage.getItem("input_" + i)) {
        document.querySelector(".main_box .output_fields .output_field .out_data .data").innerHTML = "";
    }
    while(localStorage.getItem("input_" + i)) {
        document.querySelector(".main_box .output_fields .output_field .out_data .data").innerHTML += localStorage.getItem("input_" + i);
        i++;
    }
}