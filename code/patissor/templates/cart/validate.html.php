<div>
    <p>
        Vous allez bientot confirmer votre commande !
    </p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
        <input type="hidden" name="business" value="formation@xonatis.com">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="Achat de gâteaux">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="amount" value="<?= $cart->totalPrice ?>">
        <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
    </form>
</div>
