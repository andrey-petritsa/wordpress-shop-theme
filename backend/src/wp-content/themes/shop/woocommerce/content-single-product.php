<?php
global $product;
?>
<div class="wrapper">
    <a href="/" class="back_link">
        Вернуться на главную страницу
    </a>
    <div class="product-big-card">
        <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product-big-card__image">
        <div class="product-big-card__info">
            <div class="product-big-card__wrapper">
                <div class="product-card__name product-card__name_big"><?php echo $product->get_title()?></div>
                <div class="product-card__price product-card__price_big"><?php echo $product->get_price_html()?></div>
                <a href="?add-to-cart=<?php echo $product->get_id() ?>">
                    <button class="product-card__add-cart product-card__submit_sm-margin">В корзину</button>
                </a>

            </div>
            <div class="product-big-card__description"><?php echo $product->get_description()?></div>
        </div>
    </div>
</div>

