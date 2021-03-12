let houseMixin = {
    wordReplace(str, str1) {
        this.description = this.description.replace(str, str1);
    },

    wordDelete(str) {
        this.description = this.description.replace(str, '');
    },

    wordInsertAfter(str, str1) {
        this.description = this.description.replace(str, `${str} ${str1}`);
    },

    wordEncrypt() {
        const input = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        const output = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
        let encoded = '';
        for (let i=0; i < this.description.length; i++) {
            if(isLetter(this.description[i])) {
                const index = input.indexOf(this.description[i]);
                encoded += output[index];
            }
            else {
                encoded += this.description[i]
            }
        }
        this.description = encoded
    },

    wordDecrypt() {
        const input = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
        const output = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let encoded = '';
        for (let i=0; i < this.description.length; i++) {
            if(isLetter(this.description[i])) {
                const index = input.indexOf(this.description[i]);
                encoded += output[index];
            }
            else {
                encoded += this.description[i]
            }
        }
        this.description = encoded
    }
}

function isLetter(c) {
    return c.toLowerCase() != c.toUpperCase();
}

const house = new HouseBuilder('88 Crescent Avenue',
    'Spacious town house with wood flooring, 2-car garage, and a back patio.',
    'J. Smith', 110, 5);
Object.assign(house, houseMixin);
console.log(house.getDaysToBuild());
// 220
console.log(house.description);
// Spacious town house with wood flooring, 2-car garage, and a back patio.
house.wordReplace("wood", "tile");
console.log(house.description);
// Spacious town house with tile flooring, 2-car garage, and a back patio.
house.wordDelete("town ");
console.log(house.description);
// Spacious house with tile flooring, 2-car garage, and a back patio.
house.wordInsertAfter ("with", "marble");
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.
house.wordEncrypt();
console.log(house.description);
// Fcnpvbhf ubhfr jvgu zneoyr gvyr sybbevat, 2-pne tnentr, naq n onpx cngvb.
house.wordDecrypt();
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.