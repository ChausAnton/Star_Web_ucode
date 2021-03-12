class human {
    constructor(firsName, lastName, gender, age, calories) {
        this.firsName = firsName;
        this.lastName = lastName;
        this.gender = gender;
        this.age = age;
        this.calories = calories;
        this._feed = false;
        this._sleep = false;
        setInterval(() => this.hungry(), 60000);
    }

    hungry() {
        this.calories -= 200;
        document.querySelector('.data_human .calories').innerHTML = "calories - " + this.calories;
    }

    sleepFor(delay) {
        if(!this._feed && !this._sleep) {
            this._sleep = true;
            document.querySelector('.data_human .some_info').innerHTML = "I'm sleeping"
            setTimeout(() => {
                document.querySelector('.data_human .some_info').innerHTML = "I'm awake now"
                setTimeout(() => {
                    document.querySelector('.data_human .some_info').innerHTML = ""
                    this._sleep = false;
                }, 2500);
            }, delay * 1000)
        }
    }

    feed() {
        if(!this._sleep && !this._feed) {
            this._feed = true
            document.querySelector('.data_human .some_info').innerHTML = "Nom nom nom"
            setTimeout(() => {
                this.calories += 200;
                document.querySelector('.data_human .calories').innerHTML = "calories - " + this.calories;
                if(this.calories < 500) {
                    document.querySelector('.data_human .some_info').innerHTML = "I'm still hungry";
                }
                else {
                    document.querySelector('.data_human .some_info').innerHTML = "I'm not hungry";
                }
                setTimeout(() => {
                    document.querySelector('.data_human .some_info').innerHTML = "";
                    this._feed = false
                }, 2500)
            }, 10000)
        }
    }
}

class superhero extends human {
    constructor(firsName, lastName, gender, age, calories) {
        super(firsName, lastName, gender, age, calories);
        this._fly = false;
        this._figth = false;
        document.querySelector(".middle .image_human_not").classList.replace('image_human_not', 'image_human');
        document.querySelector(".middle .image_human").classList.replace('image_human', 'image_human_not');

        document.querySelector(".bottom .fly").classList.replace('not', 'n');
        document.querySelector(".bottom .fight").classList.replace('not', 'n');

        document.querySelector(".top .human_superhero").classList.replace('n', 'not');
    }

    fly() {
        if(!this._feed && !this._sleep && !this._figth && !this._fly) {
            this._fly = true;
            document.querySelector('.data_human .some_info').innerHTML = "I'm flying!"
            setTimeout(() => {
                document.querySelector('.data_human .some_info').innerHTML = ""
                this._fly = false;
            }, 10000)
        }
    }

    fightWithEvil() {
        if(!this._feed && !this._sleep && !this._fly && !this._figth) {
            this._figth = true;
            document.querySelector('.data_human .some_info').innerHTML = "Khhhh-chh... Bang-g-g-g... Evil is defeated"
            setTimeout(() => {
                document.querySelector('.data_human .some_info').innerHTML = ""
                this._figth = false;
            }, 2500)
        }
    }
}

var hu = new human("Anton", "Fggg", "Helicopter", "19", 0);
var sup;

document.querySelector(".top .human_superhero").addEventListener("click", event => {
    if(hu.calories >= 500 && !hu._feed && !hu._sleep) {
        sup = new superhero("Anton", "Fggg", "Helicopter", "19", hu.calories);
    }
})

document.querySelector(".bottom .sleep").addEventListener("click", event => {
    hu.sleepFor(prompt("sleep time?"));
})

document.querySelector(".bottom .feed").addEventListener("click", event => {
    hu.feed();
})

document.querySelector(".bottom .fly").addEventListener("click", event => {
    sup.fly();
})

document.querySelector(".bottom .fight").addEventListener("click", event => {
    sup.fightWithEvil();
})