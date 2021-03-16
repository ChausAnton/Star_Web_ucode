var last = -1;

var filmsList = [
    ["John Wick", "24/11/2019",
        "John Wick - a former contract killer - leads a measured life when a criminal steals his beloved 1969 Mustang and in the process kills Daisy's dog, the only living reminder of his deceased wife. The thirst for revenge awakens in him a seemingly lost grip", ["Keanu Reeves", "Ian McShane", "Lance Reddick", "Bridget Moynahan"], "assets/images/film1.png"
    ],
    ["Avengers: Endgame", "25/04/2019",
        "The surviving members of the Avengers team and their allies must develop a new plan that will help withstand the ravages of the powerful titan Thanos. After the largest and most tragic battle in history, they cannot afford to be wrong.", ["Chris Evans", "Chris Hemsworth", "Robert Downey Jr.", "Jeremy Renner"], "assets/images/film2.png"
    ],
    ["Inception", "22/7/2010",
        "Cobb is a talented thief, the best of the best in the dangerous art of extraction: he steals valuable secrets from the depths of the subconscious during sleep, when the human mind is most vulnerable. Cobb's rare abilities made him a valuable player in the betrayal world of industrial espionage, but they also transformed him.", ["Leonardo DiCaprio", "Tom Berenger", "Ken Watanabe", "Cillian Murphy"], "assets/images/film3.png"
    ]
]


function selectFilm(i) {
    let title = document.querySelector(".mian_box .left_box .list .film" + i);
    title.setAttribute("style", "border-left: 3px solid #3985D1;")

    if (last != -1) {
        let last_title = document.querySelector(".mian_box .left_box .list .film" + last);
        last_title.setAttribute("style", "border: none;")
    }

    let titleFilm = document.querySelector(".mian_box .right_box .info .title_date .title_film");
    titleFilm.innerHTML = filmsList[i - 1][0];

    let dateFilm = document.querySelector(".mian_box .right_box .info .title_date .date_film");
    dateFilm.innerHTML = filmsList[i - 1][1];

    let description = document.querySelector(".mian_box .right_box .info .description_text");
    description.innerHTML = filmsList[i - 1][2];

    let node = document.querySelector(".mian_box .right_box .actors");
    while (node.lastChild) {
        node.removeChild(node.lastChild);
    }

    for (let j of filmsList[i - 1][3]) {
        let actor = document.createElement("div");
        actor.setAttribute("class", "actor");
        let p = document.createElement("p");
        p.setAttribute("class", "actor_p")
        p.innerHTML = j;

        actor.appendChild(p);
        document.querySelector(".mian_box .right_box .actors").appendChild(actor);

    }

    let imageDelete = document.querySelector(".mian_box .right_box .film_image .image");
    if (imageDelete) {
        document.querySelector(".mian_box .right_box .film_image").removeChild(imageDelete);
    }

    let image = document.createElement("img");
    image.setAttribute("class", "image");
    image.setAttribute("src", filmsList[i - 1][4]);
    document.querySelector(".mian_box .right_box .film_image").appendChild(image);
    last = i;

}

selectFilm(1);

document.querySelector(".mian_box .left_box .list .film1").addEventListener("click", event => {
    selectFilm(1);
});

document.querySelector(".mian_box .left_box .list .film2").addEventListener("click", event => {
    selectFilm(2);
});

document.querySelector(".mian_box .left_box .list .film3").addEventListener("click", event => {
    selectFilm(3);
});