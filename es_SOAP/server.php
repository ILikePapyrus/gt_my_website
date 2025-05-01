<?php
    // Crea la tabella
    function creaTabella($nome, $cognome, $email, $password) {
        return "<tr><td>" . $nome . "</td><td>" . $cognome . "</td><td>" . $email . "</td><td>" . $password . "</td></tr>";
    }

    // Basandosi sul WDSL crea il server SOAP
    $server = new SoapServer("http://localhost/es_SOAP/es_SOAP.wsdl", ['soap_version' => SOAP_1_1]);

    // Inserisce la funzione all'interno del servizio SOAP
    $server->addFunction("creaTabella");

    // Gestione delle richieste al servizio
    $server->handle();
?>