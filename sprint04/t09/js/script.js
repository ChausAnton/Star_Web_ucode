let date = new Date();
date.setTime(date.getTime() + (60000))

function phoneNumber() {
    let phoneNum = document.getElementById("input_");
    let text = phoneNum.value.trim();
    if(text.match(/^\d{10}$/g)) {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = `${text.slice(0,3)}-${text.slice(3,6)}-${text.slice(6,10)}`;
    }
    else {
        document.querySelector(".main_box .output_fields .output_field .data").innerHTML = "Invalid phone number"
    }

    let phoneNumberCnt = getCookie("phoneNumberCnt");
    document.cookie = "phoneNumberCnt=" + (++phoneNumberCnt) + ";expires=" + date.toGMTString();
}

function WordCount() {
    let wordNode = document.getElementById("input_");
    let word = wordNode.value.trim();

    let textNode = document.getElementById("textarea_");
    let text = textNode.value.trim();

    let WordCountCnt = getCookie("WordCountCnt");
    document.cookie = "WordCountCnt=" + (++WordCountCnt) + ";expires=" + date.toGMTString();

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

    let wordReplaceCnt = getCookie("wordReplaceCnt");
    document.cookie = "wordReplaceCnt=" + (++wordReplaceCnt);+ ";expires=" + date.toGMTString()

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

function displayCookie() {
    let wordReplaceCnt = getCookie("wordReplaceCnt") || 0;
    document.querySelector(".main_box .buttons_box .replace").innerHTML = "Word replace [" + wordReplaceCnt + "]";

    let WordCountCnt = getCookie("WordCountCnt") || 0;
    document.querySelector(".main_box .buttons_box .word").innerHTML = "Word count [" + WordCountCnt + "]";

    let phoneNumberCnt = getCookie("phoneNumberCnt") || 0;
    document.querySelector(".main_box .buttons_box .to_phone").innerHTML = "To phone number [" + phoneNumberCnt + "]";

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

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
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