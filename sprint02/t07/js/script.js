function sortEvenOdd(a) {
    a.sort(function(a, b) {return a%2 - b%2 || a - b });
}