
<main>

<?php
   

    foreach($allCakes as $cake){

        ?>

        <!-- HTML -->
        <div>
            <h2> <?= $cake->name ?></h2>
            <div> <?= $cake->description ?></div>
            <div> <?= $cake->price ?></div>

            <form action="/cart/add"  method="POST">
                <input type="hidden" value="<?= $cake->id ?>" name="cake-cart-id">
                <button type="submit">Ajouter au panier</button>
            </form>

        </div>


        <?php

    }

?>

</main>