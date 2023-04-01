<?php
require_once("nusoap.php");
$mt = 1;
if (isset($_POST['action'])) {

    $action = $_POST['action'];
    if ($action == "OK") {
        $mt = $_POST["montant"];
        $client = new  SoapClient("http://localhost:8686/BankWS?wsdl");
        $param = new stdClass();
        $param->amount = $mt;
        $rep = $client->__soapCall("ConvertDollartoDH", array($param));
        $res = $rep->return;
    } elseif ($action == "listComptes") {
        $client = new SoapClient("http://localhost:8686/BankWS?wsdl");
        $res2 = $client->__soapCall("getcompteList", array());
    }
}
