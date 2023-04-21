



function afficheSeanceInEmploi(idTD, groupId, seanceId, matiereId, semaineDebut, semaineFin, salle, semestreId) {
  let TD = document.getElementById(idTD);
  // let semestre = document.getElementById('selectSemestre').value;
  TD.innerHTML =
    '<div class="taskRow"> <div class="taskColTop">' + matiereId + '<br>' + semaineDebut + '--' + semaineFin + '</div><div class="taskColBottom">' + salle + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + groupId + '</div></div><form action="listStudent/dt.php" method="post" id="form' + idTD + '"> <input type="hidden" value="' +
    groupId +
    '" name="groupId"> <input type="hidden" value="' + seanceId +
    '" name="seanceId"> <input type="hidden" value="' + semestreId + ' " name="semestreId"><input type="hidden" id=" semaineDebut" value="' + semaineDebut + ' " name="semaineDebut"><input type="hidden" id="semaineFin" value="' + semaineFin + ' " name="semaineFin"></form>';
  if (semestreId == 'S1') {
    TD.style.backgroundColor = 'rgb(134, 205, 255)';
    TD.style.color = 'black';

    TD.style.fontWeight = '700';
  } else {
    TD.style.backgroundColor = ' rgb(164, 134, 255)';
    TD.style.color = 'black';
    TD.style.fontWeight = '700';

  }
  // TD.setAttribute("data-bs-toggle", "modal");
  // TD.setAttribute("data-bs-target", "#staticBackdrop");
  TD.setAttribute("onclick", "goToStudentList(form" + idTD + ")");
}

// }
function goToStudentList(target) {
  let form = document.getElementById(target.id);
  // let semaineDebut = form.querySelector("input[name='semaineDebut']").value;
  // let semaineFin = form.querySelector("input[name='semaineFin']").value;
  // let semaineD = semaineDebut.slice(1, 4);
  // let semaineF = semaineFin.slice(1, 4);
  // semaineD = Number(semaineD);
  // semaineF = Number(semaineF);
  // let semaines = [];
  // for (let i = semaineD; i <= semaineF; i++) {
  //   semaines.push(i);
  // }
  let semaineDebut = form.querySelector("input[name='semaineDebut']").value;
  let semaineFin = form.querySelector("input[name='semaineFin']").value;
  let semaineD = semaineDebut.slice(1, 4);
  let semaineF = semaineFin.slice(1, 4);
  semaineD = Number(semaineD);
  semaineF = Number(semaineF);
  console.log("semaineD" + semaineD);
  console.log("semaineF" + semaineF);

  let semaines = [];
  for (let i = semaineD; i <= semaineF; i++) {
    semaines.push(i);
  }
  Swal.fire({
    title: 'Select Semaine',
    input: 'select',
    inputOptions: {
      'Semaines': semaines
    },
    inputPlaceholder: 'Select a Semaine',
    showCancelButton: true
  }).then((result) => {
    if (result.value) {
      let selectedValue = result.value;
      // console.log(selectedValue);
      // console.log(result);
      console.log(semaines[result.value]);
      let input = document.createElement("input");
      input.setAttribute("type", "hidden");
      input.setAttribute("id", "selectedWeek");
      input.setAttribute("name", "selectedWeek");
      input.setAttribute("value", semaines[selectedValue]);
      form.appendChild(input);
      form.submit();
    }
  });


  // if (form) {
  //   console.log(target.id);
  // } else {
  //   console.log("form not found");
  // }
}

  // document.getElementById(target).submit();


// function bringEmploi() {
//   var selectSemestre = document.getElementById('selectSemestre');
//   let SemestreID = selectSemestre.options[selectSemestre.selectedIndex].value;
//   var semaine = document.getElementById('selectSemaine');
//   var emploiSection = document.getElementById('emploiSection');
//   var value = semaine.options[semaine.selectedIndex].value;
//   var text = semaine.options[semaine.selectedIndex].text;
//   console.log(value);
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       // var obj = this.responseText;
//       var Emploi = JSON.parse(this.responseText);
//     }

//     emploiSection.innerHTML = Emploi[value + SemestreID];
//   };
//   xhttp.open("GET", "JSON/test.json", true);
//   xhttp.send();
// }
// function changeSelected(Semaine) {
//   const select = document.getElementById('selectSemaine');
//   select.value = Semaine;
// }
// function calculeDateDeference(semain) {
//   // JavaScript program to illustrate
//   // calculation of no. of days between two date

//   // To set two dates to two variables
//   var date1 = new Date("10/16/2022");
//   var date2 = new Date("10/20/2022");

//   // To calculate the time difference of two dates
//   var Difference_In_Time = date2.getTime() - date1.getTime();

//   // To calculate the no. of days between two dates
//   var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24 * 7);

//   //To display the final no. of days (result)
//   // console.log("Total number of days between dates <br>"
//   // 		+ date1 + "<br> and <br>"
//   // 		+ date2 + " is: <br> "
//   // 		+ Difference_In_Days);
//   var defDays = Difference_In_Days;
//   //17/10 to 22/10 ==== S1
//   console.log(defDays);
//   if (defDays <= 1) changeSelected('S1' + semain);
//   else if (1 < defDays && defDays <= 2) changeSelected('S2' + semain);
//   else if (2 < defDays && defDays <= 3) changeSelected('S3' + semain);
//   else if (3 < defDays && defDays <= 4) changeSelected('S4' + semain);
//   else if (4 < defDays && defDays <= 5) changeSelected('S5' + semain);
//   else if (5 < defDays && defDays <= 6) changeSelected('S6' + semain);
//   else if (6 < defDays && defDays <= 7) changeSelected('S7' + semain);
//   else if (7 < defDays && defDays <= 8) changeSelected('S8' + semain);
//   else if (8 < defDays && defDays <= 9) changeSelected('S9' + semain);
//   else if (9 < defDays && defDays <= 10) changeSelected('S10' + semain);
//   else if (10 < defDays && defDays <= 11) changeSelected('S11' + semain);
//   else if (11 < defDays && defDays <= 12) changeSelected('S12' + semain);
// }
// // bringEmploi();