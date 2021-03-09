class Calculator {
    constructor(num) {
        this.res = num || NaN;
    }
    init(num) {
        this.res = num || 0;
        return this;
    }
    add(num) {
        this.res += num || 0;
        return this;
    }
    sub(num) {
        this.res -= num || 0;
        return this;
    }
    mul(num) {
        this.res *= num || 1;
        return this;
    }
    div(num) {
        this.res /= num || 1;
        return this;
    }
    alert() {
        setTimeout(() => alert(this.res), 5000);
    }
}

