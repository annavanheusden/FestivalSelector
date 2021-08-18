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
