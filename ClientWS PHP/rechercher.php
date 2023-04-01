<?php
require_once("nusoap.php");
$nom = "";
if (isset($_POST['OK'])) {
    $nom = $_POST['nom'];
    $client = new SoapClient('http://localhost:8686/BankWS?wsdl');
    $param2 = new stdClass();
    $param2->code = $nom;
    $rep = $client->__soapCall("getCompte", array($param2));
    //$resultat = $rep->return;
} elseif (isset($_GET['listComptes'])) {
    $client = new SoapClient("http://localhost:8686/BankWS?wsdl");
    $res3 = $client->__soapCall("getcompteList", array());
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Client PHP Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Page Principal </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="rechercher.php">Recherche un Compte</a>
    </li>

</ul>

<p class="h2" style="padding-bottom: 10%;padding-top: 10%;color: white;">Welcom To Mon Web Service</p>

<body style="padding-left:10% ; background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
    <form method="post" action="rechercher.php">
        <p class="p-3 mb-2 bg-primary text-white" style="margin-right: 30%;"> Rechercher Par Nom: </p><input type="text " name="nom" value="<?php echo ($nom) ?>">
        <input type="submit" value="OK" name="OK" class="btn btn-primary">

        <?php if (isset($rep)) { ?>
            <table border="1" width="80%" class="table table-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">SOLDE</th>
                    <th scope="col">Date Creation</th>
                </tr>

                <tr>
                    <td><?php echo ($rep->return->code); ?></td>
                    <td><?php echo ($rep->return->prenom); ?></td>
                    <td><?php echo ($rep->return->nom); ?></td>
                    <td><?php echo ($rep->return->solde); ?></td>
                    <td><?php echo ($rep->return->dateCreat); ?></td>
                </tr>

            </table>
        <?php } ?>
</body>

</html>