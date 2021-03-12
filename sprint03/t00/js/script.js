function houseBlueprint(address, description, owner, size, date) {
    this.address = address;
    this.date = date;
    this.description = description;
    this.owner = owner;
    this.size = size;

    this._averageBuildSpeed = 0.5;

    this.getDaysToBuild = () => {
        return this.size / this._averageBuildSpeed;
    }
}

function HouseBuilder(address, description, owner, size, room) {
    houseBlueprint.call(this, address, description, owner, size, new Date(Date.now()));
    this.roomCount = room;
}

const house = new HouseBuilder('88 Crescent Avenue','Spacious town house with wood flooring, 2-car garage, and a back patio.','J. Smith',110,5);
console.log(house.address);
// '88 Crescent Avenue'

console.log(house.description);
// 'Spacious town house with wood flooring, 2-car garage, and a back patio.'
console.log(house.size);
// 110
console.log(house.date.toDateString());
// [the current date], for example:'Tue Aug 11 2020'
console.log(house.owner);
// J. Smith
console.log(house._averageBuildSpeed);
// 0.5
console.log(house.getDaysToBuild());
// 220
console.log(house.roomCount);
//5