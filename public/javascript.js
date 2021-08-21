/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function pythonService(price) {
    var currency = document.getElementById("CurrencyCode").value;
    url = "http://127.0.0.1:5000/convert/"+ price + "/" + currency;
    fetch(url)
        .then(response => response.json())
        .then(json => changeHTMLCurrency(json));
}

function changeHTMLCurrency(json) {
    document.getElementById("prijsID").innerHTML = Math.ceil(json.converted) + " " + json.currency;
}

function zoekFestival() {
    //REST-service oproepen
    // URL definieren
    // omdat we GET-methode moeten we de parameters in de url steken
    var minPrijs = document.getElementById("minPrijs").value;
    var maxPrijs = document.getElementById("maxPrijs").value;
    
    var url = "/api/festivals/search/" + minPrijs + "/" + maxPrijs;
    
    fetch(url)
       .then(response => response.text())
       .then(html => insertIntoDiv(html));
    
}

function insertIntoDiv(html) {
    document.getElementById('gevondenFestivals').innerHTML = html;
}