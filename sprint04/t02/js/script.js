var Top = new Array('Name', 'Strength', 'Age');
var content = [
    ["Black Panther", "66", "53"],
    ["Capitain America", "79", "137"],
    ["Capitan Marvel", "97", "26"],
    ["Hulk", "80", "49"],
    ["Iron Man", "88", "48"],
    ["Spider-Man", "78" , "16"],
    ["Thanos", "99", "1000"],
    ["Thor", "95", "1000"],
    ["Yon-Rogg", "73", "52"]
];

function setTable() {
    let body = document.getElementsByTagName("body")[0];
    let table = document.createElement("table");
    let tbody = document.createElement("tbody");
    for(let i = 0; i < 10; i++) {
        let row = document.createElement("tr");
        for(let j = 0; j < 3; j++) {
            let cell = document.createElement("td");
            if(i == 0) {
                let text = document.createTextNode(Top[j]);
                cell.appendChild(text);
            }
            else {
                let text = document.createTextNode(content[i - 1][j]);
                cell.appendChild(text);
            }
            row.appendChild(cell);
        }
        tbody.appendChild(row);
    }
    table.appendChild(tbody);
    body.appendChild(table);
}

setTable();