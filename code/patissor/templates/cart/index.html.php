<a href="/cart/clear">Vider mon panier</a>
<a href="/cart/validate">Passer au paiement</a>
<table>
    <tr>
        <td>Nom</td>
        <td>Quantité</td>
        <td>Prix unitaire</td>
        <td>Prix total</td>
    </tr>
<?php

foreach ($cart->detailCakeQuantity as $item) {

    ?>

    <tr>
        <td><?= $item->cake->name ?></td>
        <td>
            <form method="POST" action="/cart/remove">
                <input type="hidden" name="cake-cart-id" value="<?= $item->cake->id ?>" />
                <?= $item->quantity ?> <button type="submit">-</button>
            </form>
        </td>
        <td><?= $item->cake->price ?></td>
        <td><?= $item->totalPrice ?></td>
        <td>
            
        </td>
    </tr>


    <?php
}

?>
</table>