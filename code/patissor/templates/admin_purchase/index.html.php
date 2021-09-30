<div>
<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Client</th>
    </tr>
<?php
   

    foreach($purchases as $purchase){

        ?>

        <tr>
            <td><?= $purchase->created_at ?></td>
            <td><?= $purchase->reference ?></td>
            <td><?= $purchase->total_price ?></td>
            <td>
                <a href="/admin/user?id=<?= $purchase->user_id ?>"><?= $purchase->user_id ?></a>
            </td>
        </tr>


        <?php

    }

?>
</table>
</div>