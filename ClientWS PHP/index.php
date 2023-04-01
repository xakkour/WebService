<?php
require_once("nusoap.php");
$mt = 1;
if (isset($_POST['action'])) {

    $action = $_POST['action'];
    if ($action == "OK") {
        $mt = $_POST["montant"];
        $client = new  SoapClient("http://localhost:8686/BankWS?wsdl");
        $param = new stdClass();
        $param->solde = $mt;
        $rep = $client->__soapCall("ConvertDollartoDH", array($param));
        $res = $rep->return;
    } elseif ($action == "List des Comptes") {
        $client = new SoapClient("http://localhost:8686/BankWS?wsdl");
        $res2 = $client->__soapCall("compteList", array());
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Client PHP Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body style="padding-left:10% ; background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Page Principal </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="rechercher.php">Recherche un Compte</a>
        </li>

    </ul>

    <p class="h2" style="padding-bottom: 10%;padding-top: 10%;color: white;">Welcom To Mon Web Service</p>

    <form method="post" action="index.php">
        <div class="p-3 mb-2 bg-primary text-white" style="margin-right: 30%;"> Convert Montant </div> <input type="text" name="montant" value="<?php echo ($mt) ?>">
        <input type="submit" value="OK" name="action" class="btn btn-primary">
        <input type="submit" value="List des Comptes" name="action" class="btn btn-primary">
    </form>
    <div class="p-3 mb-2 bg-primary text-white" style="margin-top: 5%;">Resultat: </div>
    <?php if (isset($res)) {
        echo ($res);
    } ?>
    <?php if (isset($res2)) { ?>
        <table border="1" width="80%" class="table table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">SOLDE</th>
                <th scope="col">dateCreat</th>
            </tr>
            <?php foreach ($res2->return as $cp) { ?>
                <tr>
                    <td><?php echo ($cp->code) ?></td>

                    <td><?php echo ($cp->nom) ?></td>
                    <td><?php echo ($cp->prenom) ?></td>
                    <td><?php echo ($cp->solde) ?></td>
                    <td><?php echo ($cp->dateCreat) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>