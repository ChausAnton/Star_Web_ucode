function total(addCount=0, addPrice=0, currentTotal=0) {
    addCount = typeof addCount == 'number' ? addCount : 0;
    addPrice = typeof addPrice == 'number' ? addPrice : 0;
    currentTotal = typeof currentTotal == 'number' ? currentTotal : 0;
    
    let prise = (addCount * addPrice) + currentTotal;

    return prise.toFixed(2);
}