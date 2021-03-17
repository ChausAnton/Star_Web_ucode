function phoneNumber() {
    let phoneNum = document.getElementById("input_");
    let text = phoneNum.value.trim();
    if(text.match(/^\d{10}$/g)) {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = `${text.slice(0,3)}-${text.slice(3,6)}-${text.slice(6,10)}`;
    }
    else {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = "Invalid phone number"
    }
}

function WordCount() {
    let wordNode = document.getElementById("input_");
    let word = wordNode.value.trim();

    let textNode = document.getElementById("textarea_");
    let text = textNode.value.trim();

    if(checkInput(word, text) == 1) {
        return
    }
    else {
        let count = text.split(word).length - 1;
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = "Word count: " + count;
    }

}

function wordReplace() {
    let wordNode = document.getElementById("input_");
    let word = wordNode.value.trim();

    let textNode = document.getElementById("textarea_");
    let text = textNode.value.trim().replace("\n", " ");

    let newStr = "";

    if(checkInput(word, text) == 1) {
        return
    }
    else {
        let arr = clearArr(text.split(" "));
        for(let i = 0; i < arr.length; i++) {
            newStr += word + " ";
        }
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = newStr;
    }
}

function clearArr(strArr) {
    console.log(strArr);
    strArr = strArr.filter((val) => {
        if(val != "" && val != "\n") {
            return true;
        }
    });
    return strArr;
}

function checkInput(word, text) {
    if(word == "") {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = "Invalid word";
        return 1;
    }
    else if(text == "") {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = "Invalid text";
        return 1;
    }
    return -1;
}