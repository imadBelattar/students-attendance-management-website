function bringEmploi() {
    var semaine=document.getElementById('selectSemaine');
    var emploiSection=document.getElementById('emploiSection');
    var value = semaine.options[semaine.selectedIndex].value;
    var text = semaine.options[semaine.selectedIndex].text;
    // console.log(value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // var obj = this.responseText;
        var Emploi = JSON.parse(this.responseText);
    }
    emploiSection.innerHTML=Emploi[value];
    };
    xhttp.open("GET", "JSON/timeSch.json", true);
    xhttp.send();
}
function changeSelected (Semaine){
  const select = document.getElementById('selectSemaine');
  select.value = Semaine;
}
function calculeDateDeference(){
	// JavaScript program to illustrate
	// calculation of no. of days between two date
	
	// To set two dates to two variables
	var date1 = new Date("10/16/2022");
	var date2 = new Date("10/20/2022");
	
	// To calculate the time difference of two dates
	var Difference_In_Time = date2.getTime() - date1.getTime();
	
	// To calculate the no. of days between two dates
	var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24*7);
	
	//To display the final no. of days (result)
	// console.log("Total number of days between dates <br>"
	// 		+ date1 + "<br> and <br>"
	// 		+ date2 + " is: <br> "
	// 		+ Difference_In_Days);
	return Difference_In_Days;
}
var defDays=calculeDateDeference();
//17/10 to 22/10 ==== S1
console.log(defDays);
if(defDays<=1)changeSelected('S1');
else if(1 < defDays && defDays <=2)changeSelected('S2');
else if(2 < defDays && defDays <=3)changeSelected('S3');
else if(3 < defDays && defDays <=4)changeSelected('S4');
else if(4 < defDays && defDays <=5)changeSelected('S5');
else if(5 < defDays && defDays <=6)changeSelected('S6');
else if(6 < defDays && defDays <=7)changeSelected('S7');
else if(7 < defDays && defDays <=8)changeSelected('S8');
else if(8 < defDays && defDays <=9)changeSelected('S9');
else if(9 < defDays && defDays <=10)changeSelected('S10');
else if(10 < defDays && defDays <=11)changeSelected('S11');
else if(11 < defDays && defDays <=12)changeSelected('S12');
bringEmploi();

// switch(defDays){
//     case defDays<=1: console.log("s11111111");break;
//     case (1 < defDays && defDays <=2): console.log("s2dd");break;
//     case (2 < defDays & defDays <=3): changeSelected('S3');break;
//     // (0 <= val &&  val < 1000)
// }
// if(defDays<7){
//     changeSelected('S1');
// }else changeSelected('S2');
