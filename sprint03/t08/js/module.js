class Node {
    constructor(value) {
        this.value = value;
        this.next = null;
    }
}


export class LinkedList {
    constructor() {
        this.head = null;
        this.length = 0;
        this.tail = null;
    }

    add(value) {
        let node = new Node(value);

        if(!this.head) {
            this.head = node;
            this.tail = node;
            this.length++;
            return this;
        }

        this.length++;
        this.tail.next = node;
        this.tail = node;
        return this;
    }

    remove(value) {
        if(!this.head) {
            return null;
        }

        let deleted = null;

        while(this.head && this.head.value == value) {
            deleted = this.head;
            this.head = this.head.next;
        }

        let current = this.head;
        while(current.next && current) {
            if(current.next.value == value) {
                deleted = current.next;
                current.next = current.next.next
                break;
            }
            else {
                current = current.next;
            }
        }

        while(current.next) {
            current = current.next
        }
        if(this.tail && this.tail.value == value) {
            this.tail = current;
        }
        this.length--;
        return deleted;
    }

    log() {
        const arr = [];
        let current = this.head;

        while(current) {
            arr.push(current.value);
            current = current.next;
        }
        console.log(arr);
    }

    [Symbol.iterator]() {
        let element = this.head;

        return {
            next() {
                let value, done = true;

                if (element !== null) {
                    value = element.value;
                    done = false;
                    element = element.next;
                }
                
                return {
                    value: value,
                    done: done
                }
            }
        }
    }

    contains(value) {
        let current = this.head;

        while(current && current.value !== value) {
            current = current.next;
            if(current.value === value) {
                return true;
            }
        }
        return false;
    }

    get count() {
        return this.length;
    }

    clear() {
        this.head = null;
        this.length = 0;
        this.tail = null;
        return this;
    }


}