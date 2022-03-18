<?php

$location = "http://localhost/soap/InsertCategoria.php?wsdl";

$request = "
        <soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:iser=\"IsertCategoriaSOAP\">
            <soapenv:Header/>
            <soapenv:Body>
                <iser:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
                    <InsertCategoria xsi:type=\"iser:InsertCategoria\">
                        <!--You may enter the following 3 items in any order-->
                        <usu_nom xsi:type=\"xsd:string\">Consumo Test</usu_nom>
                        <usu_ape xsi:type=\"xsd:string\">Consumo Test</usu_ape>
                        <usu_correo xsi:type=\"xsd:string\">consumo_test@ui.com</usu_correo>
                    </InsertCategoria>
                </iser:InsertCategoriaService>
            </soapenv:Body>
        </soapenv:Envelope>
    ";

print("Request: <br/>");
print("<pre>" . htmlentities($request) . "</pre>");

$action = "InsertCategoriaService";
$header = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml;charset=UTF-8',
    'SOAPAction: InsertCategoriaService'
];

//Segun documentación
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch);
$err_status = curl_errno($ch);

print("Request : <br/>");
print("<pre>" . $response . "</pre>");
