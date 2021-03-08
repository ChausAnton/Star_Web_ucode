function total(addCount=0, addPrice=0, currentTotal=0) {

    if(isFinite(addCount) == true && isFinite(addPrice) == true 
    && isFinite(currentTotal) == true) {
        let prise = (addCount * addPrice) + currentTotal;
        return prise;
    }
    return 0;

}