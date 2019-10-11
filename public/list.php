<?php
include_once('connec.php.dist');
try {
    $pdo = new PDO(DSN, USER, PASS);
} catch (Exception $exception) {
    echo "Problème de connexion à la base de donnée";
}
$query = 'SELECT * FROM bribe ORDER BY name ASC';
$statement = $pdo->query($query);
$bribes = $statement->fetchAll(PDO::FETCH_ASSOC);

$query2 = 'SELECT SUM(payment) as sum_payment FROM bribe';
$statement2 = $pdo->query($query2);
$sum = $statement2->fetch();

?>

<table class="list-group">
<hr>
    <tbody>
        <thead>
        <tr>
            <th colspan="2">$</th>
        </tr>
        </thead>

    <?php foreach ($bribes as $bribe) :?>
    <tr>

        <td> <?= $bribe['name']?></td>
        <td> <?=$bribe['payment']?></td>
        <?php endforeach; ?>
        </tr>

    </tbody>

    <tfoot>
    <tr>
        <td>Sum</td>
        <td><?= $sum['sum_payment'] ?></td>
    </tr>
    </tfoot>
</table>


