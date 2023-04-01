<?php
require_once("nusoap.php");
$montant = 0;
$resultat = 0;
if (isset($_GET['montant'])) {
    $montant = $_GET['montant'];
    $client = new SoapClient('http://localhost:8686/BankWS?wsdl');
    $param = new stdClass();
    $param->amount = $montant;
    $rep = $client->__soapCall("ConvertDollartoDH", array($param));
    $resultat = $rep->return;
} elseif (isset($_GET['listComptes'])) {
    $client = new SoapClient("http://localhost:8686/BankWS?wsdl");
    $res2 = $client->__soapCall("getcompteList", array());
}

?>
<html>

<body>
    <form action="mantant.php">
        Montant:<input type="text " name="montant" value="<?php echo ($montant) ?>">
        <input type="submit" value="OK">
        <input type="submit" value="listComptes" name="action">

    </form>
    <?php echo ($montant) ?> En Dollar est Egal à <?php echo ($resultat) ?> en DH

    <?php if (isset($res2)) { ?>
        <table border="1" width="80%">
            <tr>
                <th>Code</th>
                <th>SOLDE</th>
                <th>dateCreat</th>
            </tr>
            <?php foreach ($res2->return as $cp) { ?>
                <tr>
                    <td><?php echo ($cp->code) ?></td>

                    <td><?php echo ($cp->solde) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>