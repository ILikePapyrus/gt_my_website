// XML request
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // Creazione tabella
        createTable(this.responseText);
    }
};

// Risorsa Wordpress da cui provengono i dati
xmlhttp.open("GET", "https://seahawkmedia.com/wp-json/wp/v2/posts?search=Drupal", true);
// Esecuzione richiesta dati
xmlhttp.send();

// Funzione per creare la tabella
function createTable(responseText) {
    // Array contenente tutti i dati
    const data = JSON.parse(responseText);
    // Creazione titoli colonne tabella
    let tabella = "<tr><th>ID</th><th>Nome</th><th>Data</th></tr>";
    // Riempimento tabella
    for (let x in data) {
        tabella += "<tr><td>" + data[x].id + "</td><td><a href='" + data[x].link + "' target='_blank'>"  + data[x].title.rendered + "</a></td><td>" + data[x].date_gmt +"</td>";
    }
    // Inserimento tabella nel codice html
    document.getElementById("tabella").innerHTML = tabella;
}