<form action="/admin/cake/add" method="POST">

    <input type="text" placeholder="nom du gateau" name="cake-name"> <br>
    <textarea  placeholder="Description" name="cake-description"></textarea> <br>
    <input type="number" placeholder="prix" name="cake-price"> <br>

    <button type="submit">enregistrer</button>

</form>

<div>
<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
    </tr>
<?php
   

    foreach($cakes as $cake){

        ?>

        <tr>
            <td><?= $cake->name ?></td>
            <td><?= $cake->description ?></td>
            <td><?= $cake->price ?></td>
        </tr>


        <?php

    }

?>
</table>
</div>