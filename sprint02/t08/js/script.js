function checkBrackets(str) {
    if(typeof(str) == "string") {
        let i = 0;
        let open = 0;
        let need = 0;
        while(i < str.length) {
            if(str[i] == '(') {
                open++;
            }
            else if(str[i] == ')') {
                if(open == 0) {
                    need++;
                }
                else {
                    open--;
                }
            }
            i++
        }
        return need + open;
    }
    return -1;
}
