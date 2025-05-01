<!DOCTYPE html>

<html>
    <head>
        <!-- Titolo scheda -->
        <title>Client - Es SOAP</title>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="stile.CSS" />
    </head>
    <body>
        <h1>Trasferimento dati tramite SOAP</h1>

        <br>

        <div class="container" style="flex-grow: 1;">
            <div class="row justify-content-center align-items-start" style="min-height: 100%;">
                <!-- Card input -->
                <div class="col-md-6">
                    <!-- Crea la card contenente il form -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <!-- Elementi richiesti nel form di iscrizione -->
                                <div class="row g-3 align-items-center">
                                    <!-- Nome -->
                                    <div class="col-auto">
                                        <label for="inputNome" class="col-form-label">Nome</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputNome" name="nome" class="form-control" size="30">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center spacing-top">
                                    <!-- Cognome -->
                                    <div class="col-auto">
                                        <label for="inputCognome" class="col-form-label">Cognome</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputCognome" name="cognome" class="form-control" size="30">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center spacing-top">
                                    <!-- E-mail -->
                                    <div class="col-auto">
                                        <label for="inputMail" class="col-form-label">E-mail</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="email" id="inputMail" name="email" class="form-control" size="30">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center spacing-top">
                                    <!-- Password -->
                                    <div class="col-auto">
                                        <label for="inputPsw" class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="password" id="inputPsw" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center spacing-top">
                                    <!-- Submit -->
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" name="invia" class="btn" id="submitButton">Invia</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabella -->
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th scope="col" style="text-align: center;">Nome</th>
                            <th scope="col" style="text-align: center;">Cognome</th>
                            <th scope="col" style="text-align: center;">E-mail</th>
                            <th scope="col" style="text-align: center;">Password</th>
                        </tr>
                        <?php 
                            // URL del file WSDL
                            $wsdl_url = "http://localhost/es_SOAP/es_SOAP.wsdl";

                            // Check se il modulo di input ha inviato i dati
                            if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['email']) && isset($_POST['password'])) {
                                // Verifica che i valori non siano vuoti
                                if (!empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                    // Crea client SOAP utilizzando il WSDL
                                    $client = new SoapClient($wsdl_url);

                                    // Richiamo il servizio
                                    $response = $client->creaTabella($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['password']);

                                    // Stampa la risposta
                                    echo $response;
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>