function checkBrackets(str) {
    if(typeof(str) == "string") {
        let cnt = 0;
        let i = 0;
        let open = 0;
        let need = 0;
        while(i < str.length) {
            if(str[i] == '(') {
                open++;
            }
            else if(str[i] == ')') {
                if(open == 0) {
                    cnt++;
                    need++;
                }
                else {
                    cnt++;
                    open--;
                }
            }
            i++
        }
        if(cnt > 0) {
            return need + open;
        }
    }
    return -1;
}
