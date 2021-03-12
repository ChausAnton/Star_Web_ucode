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