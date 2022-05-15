
function utcToLocal(time){
    let unix_timestamp = time;
    var date = new Date(unix_timestamp * 1000); // multiplied by 1000 so that the argument is in milliseconds, not seconds.
    var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var y = date.getFullYear();
    var m = mS[date.getMonth()];
    var d = ("0" + date.getDate()).substr(-2);

    var hours = date.getHours();
        
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = ("0" + (hours ? hours : 12)).substr(-2); // the hour '0' should be '12'
    var minutes = ("0" + date.getMinutes()).substr(-2);
    var seconds = "0" + date.getSeconds();

    // Will display time in 10:30:23 format
    var formattedTime = d + '&nbsp;' + m + '&nbsp;' + y +" &nbsp;" +hours + ':' + minutes+ampm;

    // console.log(formattedTime);
    // var utcDate = unix_timestamp * 1000;
    // var localDate = new Date(utcDate);
    return formattedTime;

}