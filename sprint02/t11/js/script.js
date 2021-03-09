function clear(str) {
    let res = "";
    for(let i of str.split(' ')) {
        if(res.split(' ').indexOf(i) == -1) {
            res += i + " ";
        }
    }
    return res
}

function addWords(obj, str) {
    let res = clear(obj['words']);

    let temp = obj['words'].split(' ');
   

    for(let i of str.split(' ')) {
        let index = temp.indexOf(i);
        if(index == -1) {
            res += i + " ";
        }
    }

    obj['words'] = res.trim();
}




function removeWords(obj, str) {
    let res = "";
    obj['words'] = clear(obj['words']);

    for(let i of obj['words'].split(' ')) {
        if(!str.split(" ").includes(i)) {
            res += i + " ";
        }
    }

    obj['words'] = res.trim();
}


function changeWords(obj, str, str2) {
    obj['words'] = clear(obj['words']);
    let temp = obj['words'].split(" ");
    let temp1 = str.split(" ");
    let res = ""

    for(let i of temp) {
        if(temp1.indexOf(i) != -1) {
            res += str2 + " ";
        }
        else {
            res += i + " "
        }
    }
    obj['words'] = clear(res);
    obj['words'] = obj['words'].trim();
}