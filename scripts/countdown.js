var month = '6'; // 1 through 12 or '*' for next month, '0' for this month
var day = '25';   // day of month or + day offset
var hour = 9;    // 0 through 23 for the hour of the day
var tz = -4;     // offset in hours from UTC to your timezone
var lab = 'countdown';  // id of the entry on the page where the counter is to be inserted

function start() {displayCountdown(setCountdown(month,day,hour,tz),lab);}
window.onload = start;

// Countdown Javascript
// copyright 20th April 2005, 1st April 2006 by Stephen Chapman
// permission to use this Javascript on your web page is granted
// provided that all of the code in this script (including these
// comments) is used without any alteration
// you may change the start function if required
function setCountdown(month,day,hour,tz) {var toDate = new Date(); if (day.substr(0,1) == '+') {var day1 = parseInt(day.substr(1));toDate.setDate(toDate.getDate()+day1);} else{toDate.setDate(day);} if (month == '*')toDate.setMonth(toDate.getMonth() + 1);else if (month > 0) { if (month <= toDate.getMonth())toDate.setYear(toDate.getYear() + 1);toDate.setMonth(month-1);} toDate.setHours(hour);toDate.setMinutes(0-(tz*60));toDate.setSeconds(0);var fromDate = new Date();fromDate.setMinutes(fromDate.getMinutes() + fromDate.getTimezoneOffset());var diffDate = new Date(0);diffDate.setMilliseconds(toDate - fromDate);return Math.floor(diffDate.valueOf()/1000);}
function displayCountdown(countdn,cd) {if (countdn < 0) document.getElementById(cd).innerHTML = "Sorry, you are too late."; else {var secs = countdn % 60; if (secs < 10) secs = '0'+secs;var countdn1 = (countdn - secs) / 60;var mins = countdn1 % 60; if (mins < 10) mins = '0'+mins;countdn1 = (countdn1 - mins) / 60;var hours = countdn1 % 24;var days = (countdn1 - hours) / 24;document.getElementById(cd).innerHTML = days+' days '+hours+'h:'+mins+'m'/*':+secs+'s'*/;setTimeout('displayCountdown('+(countdn-1)+',\''+cd+'\');',999);}}
