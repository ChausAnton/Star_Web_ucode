function getFormattedDate(date) {
    let year = date.getFullYear();
    let month = "" + (date.getMonth() + 1);
    let date_ = "" + date.getDate();
    let hours = "" + date.getHours();
    let minutes = "" + date.getMinutes();
    let day = date.getDay();

    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
    

    if(month.length < 2) {
        month = "0" + String(month)
    }
    if(date_.length < 2) {
        date_ = "0" + String(date_)
    }
    if(hours.length < 2) {
        hours = "0" + String(hours)
    }
    if(minutes.length < 2) {
        minutes = "0" + String(minutes)
    }

    str = date_ + "." + month + "." + year + " " + hours + ":" + minutes + " " + weekday[day];
    console.log(str);
}
