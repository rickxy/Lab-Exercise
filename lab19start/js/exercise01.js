
window.addEventListener("load", function() {
    var xmlhttp = new XMLHttpRequest();
    // load the external XML file
    xmlhttp.open("GET","universities.xml",false);
    xmlhttp.send();
    var xmlDoc = xmlhttp.responseXML;
    // now extract a node list of all <university> elements
    var universities = xmlDoc.getElementsByTagName("university");
    if (universities) {
    var list = document.getElementById("universityList");
    // loop through each university element
    for (var i = 0; i < universities.length; i++) {
    // find the <name> element
    var name = universities[i].getElementsByTagName("name");
    if (name) {
    // create new <li> element
    var item = document.createElement('li');
    // make content of list item the <name> element
    item.innerHTML = name[0].textContent;
    list.appendChild(item);
    }
    }
    }
    });