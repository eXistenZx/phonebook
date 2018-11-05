<?php
include('header.php');

$sql = $db_connect->prepare("SELECT * FROM contacts");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = 0;
foreach($result as $row){
    $count++;
}
?>
<div class="count-contact">
    <?= $count; ?>

</div>
