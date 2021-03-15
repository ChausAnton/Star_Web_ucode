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
    let remove = document.getElementById("table");
    if(remove != null) {
        document.getElementsByTagName("body")[0].removeChild(remove);
    }

    let body = document.getElementsByTagName("body")[0];
    let table = document.createElement("table");
    table.setAttribute("id", "table");
    let tbody = document.createElement("tbody");
    for(let i = 0; i < 10; i++) {
        let row = document.createElement("tr");

        if(i == 0) {row.setAttribute("class", "top row");}


        else {row.setAttribute("class", "row row" + i)}
        for(let j = 0; j < 3; j++) {
            let cell = document.createElement("td");
            if(i == 0) {
                let text = document.createTextNode(Top[j]);
                cell.appendChild(text);
                cell.setAttribute("class", "top_cell cell top_cell" + i)
                cell.addEventListener("click", event => { tableSort(); })
            }
            else {
                let text = document.createTextNode(content[i - 1][j]);
                cell.appendChild(text);
                cell.setAttribute("class", "cell cell" + i)
            }
            row.appendChild(cell);
        }
        tbody.appendChild(row);
    }
    table.appendChild(tbody);
    body.appendChild(table);
}

function tableSort() {
    content = [
        ["Black Panther", "1000", "53"],
        ["Capitain America", "79", "137"],
        ["Capitan Marvel", "97", "26"],
        ["Hulk", "80", "49"],
        ["Iron Man", "88", "48"],
        ["Spider-Man", "78" , "16"],
        ["Thanos", "99", "1000"],
        ["Thor", "95", "1000"],
        ["Yon-Rogg", "73", "52"]
    ];
    setTable();
}


setTable();

