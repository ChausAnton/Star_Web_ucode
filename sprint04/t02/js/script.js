var Top = new Array('Name', 'Strength', 'Age');
var content = [
    ["Capitain America", 79, 137],
    ["Capitan Marvel", 97, 26],
    ["Hulk", 80, 49],
    ["Iron Man", 88, 48],
    ["Spider-Man", 78, 16],
    ["Thanos", 99, 1000],
    ["Thor", 95, 1000],
    ["Black Panther", 66, 53],
    ["Yon-Rogg", 73, 52]
];

var sort = false;
var column = -1;

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
                cell.addEventListener("click", event => { tableSort(j, Top[j]); })
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

function tableSort(j, str) {
    if(sort == false || column != j) {
        content.sort((a, b) => {
            return a[j] == b[j] ? 0 : (a[j] < b[j] ? -1 : 1);
        });
        document.getElementById("notification").innerHTML = "Sorting by " + str + ", order ASC"
        column = j;
        sort = true;
    }
    else{
        content.sort((a, b) => {
            return a[j] == b[j] ? 0 : (a[j] > b[j] ? -1 : 1);
        });
        document.getElementById("notification").innerHTML = "Sorting by " + str + ", order DESC"
        sort = false;
    }

    setTable();
}

setTable();

