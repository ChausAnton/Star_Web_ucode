
let elements = document.querySelectorAll("#characters > li");

for(let elem of elements) {
    if(elem != null) {
        if(elem.classList != "good" && elem.classList != "evil" && elem.classList != "unknown") {
            elem.classList = "unknown";
        }
        if(elem.getAttribute("data-element") == null) {
            elem.setAttribute("data-element", "none");
        }

        if(elem.getAttribute("data-element") == "none") {
            elem.appendChild(document.createElement("br"));

            let newDiv = document.createElement("div");
            newDiv.setAttribute("data-element", elem.getAttribute("data-element"))
            newDiv.setAttribute("class", "elem");
            let line = document.createElement("div");
            line.setAttribute("class", "line");
            newDiv.appendChild(line);
        }
        else {
            elem.appendChild(document.createElement("br"));
            for(let i of elem.getAttribute("data-element").split(" ")) {
                let newDiv = document.createElement("div");
                newDiv.setAttribute("data-element", elem.getAttribute("data-element"))
                newDiv.setAttribute("class", i + " " + "elem");
                elem.appendChild(newDiv);
            }
        }
    }
}