window.addEventListener("load", function () {
    var text = '[{"id":100654,"name":"Alabama A & M University","address":"4900 Meridian Street","city":"Normal","state":"Alabama","zip":35762,"website":"www.aamu.edu/","classification":"Masters Colleges and Universities (larger programs)","location":{"latitude":34.783368,"longitude":-86.568502}}, {"id":100663,"name":"University of Alabama at Birmingham","address":"Administration Bldg Suite 1070","city":"Birmingham","state":"Alabama","zip":"35294-0110","website":"www.uab.edu","classification":"Research Universities (very high research activity)","location":{"latitude":33.50223,"longitude":-86.80917}},{"id":100690,"name":"Amridge University","address":"1200 Taylor Rd","city":"Montgomery","state":"Alabama","zip":"36117-3553","website":"www.amridgeuniversity.edu","classification":"Baccalaureate Colleges--Arts & Sciences","location":{"latitude":32.362609,"longitude":-86.17401}},{"id":110316,"name":"California Institute of Integral Studies","address":"1453 Mission Street","city":"San Francisco","state":"California","zip":"94103","website":"www.ciis.edu","classification":"Doctoral/Research Universities","location":{"latitude":37.774768,"longitude":-122.416537}}]';
  // turn JSON string into an actual JS array of objects
  // turn JSON string into an actual JS array of objects
    var universities = JSON.parse(text);
    // display the data in the array
    var list = document.querySelector('#list');
    for (let i=0; i<universities.length; i++) {
    list.innerHTML += universities[i].name + '<br>';
}

});

