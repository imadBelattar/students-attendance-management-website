var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
    }
};
xhttp.open("GET", "student.xml", true);
xhttp.send();

function myFunction(xml) {
    var x, y, i, newElement, txt, xmlDoc;
    xmlDoc = xml.responseXML;
    newElement = xmlDoc.createElement("edition");
    x = xmlDoc.getElementsByTagName("students")[0]
    x.appendChild(newElement);

   // Display all elements
    xlen = x.childNodes.length;
    y = x.firstChild;
    txt = "";
    for (i = 0; i < xlen; i++) {
        if (y.nodeType == 1) {
            txt += y.nodeName + "<br>";
        }
        y = y.nextSibling;
    }
    document.getElementById("demo").innerHTML = txt;
}