<?php
require_once('ConnexionBDD.php');

$tempsType = $_POST['tempsType'];
$categorie = $_POST['categorie'];
$circuit = $_POST['circuit'];

$connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
$con = $connexion->connect();

$nom_table = "TempsMinParticipantCircuit".$circuit;

if ($tempsType == 'equipe'){
    $sql = 'SELECT P.ID_EQUIPE AS ID,
    MAX(TMP.TempsCumule) AS TempsCumuleMax
    FROM '.$nom_table.' TMP';
} else{
    $sql = 'SELECT TMP.ID_PARTICIPANT AS ID, TMP.TempsCumule AS TempsCumuleMax FROM '.$nom_table.' TMP';
}

$sql .= ' INNER JOIN PARTICIPANT P ON TMP.ID_PARTICIPANT = P.ID_PARTICIPANT
INNER JOIN EQUIPE E ON P.ID_EQUIPE = E.ID_EQUIPE';

if (!empty($categorie)) {
    $sql .= ' WHERE E.ID_CATEGORIE = :categorie';
}

if ($tempsType == 'equipe'){
    $sql .= ' GROUP BY P.ID_EQUIPE
    ORDER BY TempsCumuleMax';
} else{
    $sql .= ' ORDER BY TempsCumuleMax;';
}

$stmt = $con->prepare($sql);
if (!empty($categorie)) {
    $stmt->bindParam(':categorie', $categorie);
}
$stmt->execute();

// Générer le contenu HTML des résultats
$resultHtml = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resultHtml .= "<tr>";
    $resultHtml .= "<td>" . $row['ID'] . "</td>";
    $resultHtml .= "<td>" . $row['TempsCumuleMax'] . "</td>";
    $resultHtml .= "</tr>";
}

echo $resultHtml;