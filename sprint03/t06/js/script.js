let guestList = new WeakSet();

console.log("guestList");
guestList.add({name: "name1"});
guestList.add({name: "name2"});
guestList.add({name: "name3"});
guestList.add({name: "name4"});
console.log(guestList);

console.log("menu");

let menu = new Map();
menu = ([
    ["Jollof Rice", "60"],
    ["Egusi Soup", "30"],
    ["Akara", "55"],
    ["Moi Moi", "56"]
])

for(let i of menu) {
    console.log(menu);
}

console.log("bankVault");

let bankVault = new WeakMap();

let an = {
    name: "an",
    credentials: {login: "Anch", password: "0000"},
    content: "pogchamp"
};

let ch = {
    name: "ch",
    credentials: {login: "cha", password: "1111"},
    content: "pogchamp1"
};

bankVault.set(an);
bankVault.set(ch);

console.log(an);

console.log("coinCollection");

let coinCollection = new Set();

coinCollection.add({
    name: "Lincoln Cent",
    Collecting_Grade: "EF-40",
    Investment_Grade: "MS-65"
});

coinCollection.add({
    name: "Peace Dollar",
    Collecting_Grade: "MS-63",
    Investment_Grade: "MS-65"
});

coinCollection.add({
    name: "Morgan Silver Dollar",
    Collecting_Grade: "MS-63",
    Investment_Grade: "MS-65"
});

coinCollection.add({
    name: "Buffalo Nickel",
    Collecting_Grade: "EF-40",
    Investment_Grade: "MS-63"
});

for(let i of coinCollection) {
    console.log(i.name);
    console.log(i.Collecting_Grade);
    console.log(i.Investment_Grade);
}