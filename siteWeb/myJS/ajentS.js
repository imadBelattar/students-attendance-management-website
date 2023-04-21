function alertSaveEmploi() {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to undo this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Save it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        'Sauveguarde!',
        'L emploi a ete enregistre.',
        'success'
      )
      insertEmploiToJson();
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Annule',
        'L action a ete ignoree :)',
        'error'
      )
    }
  })
}



//global variable
let idTD = 0;
// Get all the td elements
const tdElements = document.querySelectorAll('td');
// Add a click event listener to each td element
tdElements.forEach(td => {
  td.addEventListener('click', event => {
    // Get the clicked td element
    const clickedTd = event.target;

    // Get the id of the clicked td element
    // clickedTd.classList.add('clicked');
    // idTD = clickedTd.id;
    localStorage.setItem("idTD", clickedTd.id);
    // console.log(clickedTd.id);

    // ajouterSeance();

  });
});
function ajouterSeance() {
  // Get the values of the form elements
  var professeurUser = document.getElementById("professeurUser").value;
  var semestreId = document.getElementById("selectSemaine").value;
  // var ajoutSemaine = document.getElementById("ajoutSemaine").value;
  // var emploiId = document.getElementById("emploiId").value;
  var filiereId = document.getElementById("filiereId").value;
  var groupId = document.getElementById("groupId").value;
  // var seanceId = document.getElementById("seanceId").value;
  var matiere = document.getElementById("matName");
  matiere = matiere.options[matiere.selectedIndex].text
  var duration = document.getElementById("duration").value;
  var salle = document.getElementById("salle").value;
  var semaineDebut = document.getElementById("semaineDebut").value;
  var semaineFin = document.getElementById("semaineFin").value;
  // Get all the td elements


  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();
  // Set the HTTP method and URL
  xhr.open("POST", "ajoutSeance.php");
  // Set the request header
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Set the callback function
  xhr.onload = function () {
    if (xhr.status == 200) {
      // Request successful, do something with the response
      console.log(xhr.response);
    } else {
      // Request failed, log the error
      console.error(xhr.statusText);
    }
  };

  let idTD = localStorage.getItem("idTD");
  // Send the request

  // console.log(groupId);
  console.log("idTD__x=" + idTD);
  const j = Number(idTD.substring(1, 2));
  console.log("j=" + j);
  duree = Number(duration);
  duration = duree + j;
  console.log(duration);
  var idArr = '';
  for (let i = j; i < duration; i++) {
    console.log("i=" + i);
    let firstPart = idTD.substring(0, 1);
    let secondPart = idTD.substring(2);
    // console.log(firstPart+i+secondPart+"<br>");
    idArr += firstPart + i + secondPart + "_";
    let tdElement = document.getElementById(firstPart + i + secondPart);
    tdElement.innerHTML = "<div class='taskRow'> <div class='taskColTop'>" + matiere + "<br>" + semaineDebut + "   --  " + semaineFin + "</div><div class='taskColBottom'>" + salle + "</div></div>";
    tdElement.style.backgroundColor = 'black';
    tdElement.style.borderLeft = '2px solid gray';
    tdElement.style.borderRight = '2px solid gray';
    tdElement.style.borderBottom = '2px solid black';
    tdElement.style.color = 'white';
  }
  let idArrStr = idArr.toString();
  // idArrStr = idArrStr.slice(1);
  // "&ajoutSemaine=" + ajoutSemaine +
  // "&emploiId=" + emploiId +
  xhr.send("semestreId=" + semestreId +
    "&filiereId=" + filiereId +
    "&groupId=" + groupId +
    "&seanceId=" + idArrStr +
    "&matiere=" + matiere +
    "&salle=" + salle +
    "&semaineDebut=" + semaineDebut +
    "&semaineFin=" + semaineFin +
    "&duration=" + duree +
    "&professeurUser=" + professeurUser
  );
  idArrStr = '';
  localStorage.removeItem("idTD");

}



function createSelect(filiereId, module, modName, searchAbout, isGroupSelect) {
  var filiere = document.getElementById(filiereId).value;
  var select = document.getElementById(modName);
  select.innerHTML = '';
  var option = document.createElement("option");
  option.text = 'Choisir';
  select.add(option);

  // Load the XML file
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Parse the XML file
      var xml = this.responseXML;

      // Get the matiere elements
      var modules = xml.getElementsByTagName(module);

      // Add options for each matiere element with a matching filiere attribute
      for (var i = 0; i < modules.length; i++) {
        var modu = modules[i];
        if (modu.getElementsByTagName(searchAbout)[0].textContent == filiere) {
          if (isGroupSelect) {
            var name = modu.getElementsByTagName("num")[0].textContent;
          } else {
            var name = modu.getElementsByTagName("name")[0].textContent;
          }
          var idM = modu.getAttribute("id");
          option = document.createElement("option");
          option.text = name;
          option.value = idM;
          select.add(option);
        }
      }
    }
  };
  xhttp.open("GET", "../auth/xml1.xml", true);
  xhttp.send();


}

function updateMatiereSelect() {
  // Get the value of the filiere dropdown menu

  // Create the matiere select element
  // var select = createMatiereSelect(filiere);

  // Append the select element to the DOM
  // console.log(select);
}


//************************pour select de professeur********************* */
function createProfSelect(userRoleId) {
  // Create a new select element
  var select = document.createElement("select");
  select.id = 'professeurUser';
  select.classList.add("select");
  // Load the XML file
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Parse the XML file
      var xml = this.responseXML;

      // Get the matiere elements
      var profs = xml.getElementsByTagName("user");

      // Add options for each matiere element with a matching filiere attribute
      var defaultOption = document.createElement("option");
      defaultOption.textContent = "Choose the teacher "
      defaultOption.id = "Chprof"
      select.add(defaultOption);

      for (var i = 0; i < profs.length; i++) {
        var professeur = profs[i];
        // console.log(profs[i].textContent);

        if (professeur.getElementsByTagName("roleID")[0].textContent == userRoleId || professeur.getElementsByTagName("roleID")[0].textContent == 2) {
          console.log(professeur);
          var firstName = professeur.getElementsByTagName("first-name")[0];
          var lastName = professeur.getElementsByTagName("name")[0];
          var pseudo = professeur.getElementsByTagName("pseudo")[0];
          // var idProf = professeur.getAttribute("id");
          var option = document.createElement("option");
          // console.log(firstName.innerHTML + "  and " + lastName.innerHTML);
          option.text = firstName.innerHTML + " " + lastName.innerHTML;
          option.value = pseudo.innerHTML;
          // console.log(idProf);
          select.add(option);
        }
      }
    }
  };
  xhttp.open("GET", "../auth/xml1.xml", true);
  xhttp.send();

  document.getElementById('SELECTS').appendChild(select);
}
createProfSelect(4);
//************************fin select de professeur********************* */

function bringEmploi() {
  var semaine = document.getElementById('selectSemaine');
  var emploiSection = document.getElementById('emploiSection');
  var value = semaine.options[semaine.selectedIndex].value;
  var text = semaine.options[semaine.selectedIndex].text;
  // console.log(value);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // var obj = this.responseText;
      var Emploi = JSON.parse(this.responseText);
    }
    emploiSection.innerHTML = Emploi[value];
  };
  xhttp.open("GET", "JSON/timeSch.json", true);
  xhttp.send();
}