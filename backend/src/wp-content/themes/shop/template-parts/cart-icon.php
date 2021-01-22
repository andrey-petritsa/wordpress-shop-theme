<?php

?>

<div class="cart-icon-wrapper">
    <a href="<?php echo wc_get_cart_url();?>" class="cart-icon">
        <img src="/wp-content/uploads/2021/01/shopping-cart.png" alt="" class="cart-icon__image">
        <div class="cart-icon__amount"><?php echo $args['data']['amount'];?></div>
    </a>
</div>


