class Timer {
    constructor(title, delay, stopCount) {
        this.title = title;
        this.delay = delay;
        this.stopCount = stopCount;
    }

    tick() {
        if(this.stopCount > 0) {
            this.stopCount--;
            console.log("Timer " + this.title + " Tick! | cycles left " + this.stopCount);
        }
        else {
            this.stop()
        }
    }

    stop() {
        console.log("Timer " + this.title + " stopped");
        clearInterval(this.intervalId);
    }

    start() {
        console.log("Timer " + this.title + " started (delay=" + this.delay + ", stopCount=" + this.stopCount + ")")
        this.intervalId = setInterval(() => this.tick(), this.delay);
    }
}

function runTimer(title, delay, stopCount) {
    let time = new Timer(title, delay, stopCount).start();
}

runTimer("Bleep", 1000, 5);