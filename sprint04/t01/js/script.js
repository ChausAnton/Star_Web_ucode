
let elements = document.querySelectorAll("#characters > li");

for(let elem of elements) {
    if(elem != null) {
        if(elem.classList != "good" && elem.classList != "evil" && elem.classList != "unknown") {
            elem.classList = "unknown";
        }
        if(!elem.getAttribute("data-element")) {
            elem.setAttribute("data-element", "none");
        }

        if(elem.getAttribute("data-element") == "none") {
            console.log("adsf ");
            elem.appendChild(document.createElement("br"));

            let newDiv = document.createElement("div");
            newDiv.setAttribute("data-element", "none")
            newDiv.setAttribute("class", "elem");
            let line = document.createElement("div");
            line.setAttribute("class", "line");
            newDiv.appendChild(line);
            elem.appendChild(newDiv);
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