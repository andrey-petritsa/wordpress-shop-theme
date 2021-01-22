<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

?>
<div class="cart">
    <? // Получаем все товары из корзины
    global $woocommerce;
    $product = $woocommerce->cart->get_cart();
    $product_info = array();

    foreach ($product as $item => $values): ?>
        <?php
        $product_info_item = array();

        $_product = wc_get_product($values['data']->get_id());
        $price = get_post_meta($values['product_id'], '_price', true);
        $quanatity = $item['quantity']; //Ошибка в логах invalid offset quantity?
        $name = $_product->get_title();
        $image_url = wp_get_attachment_url($_product->get_image_id());
        $remove_url = wc_get_cart_remove_url($item);
        $product_url = get_permalink($_product->get_id());

        // Потом эти данные полетят в телеграмм
        $product_info_item['name'] = $name;
        $product_info_item['price'] = $price;
        $product_info_item['quantity'] = $quanatity;
        $product_info_item['image_url'] = $image_url;
        array_push($product_info, $product_info_item) ?>

        <div class="cart__product small-product">
            <a href="<? echo $product_url ?>" class="small-product__image">
                <img src="<?php echo $image_url ?>" alt="">
            </a>

            <span class="small-product__name"><?php echo $name ?></span>
            <div class="small-product__quantity">
                <button class="small-product__minus-btn small-product__btn">-</button>
                <div class="small-product__amount">1</div>
                <button class="small-product__plus-btn small-product__btn">+</button>
            </div>
            <div class="small-product__final-price"><?php echo $price ?></div>
            <div class="small-product__price"><?php echo $price ?></div>
            <a class="small-product__btn-delete-wrapper" href="<?php echo $remove_url ?>">
                <button class="small-product__btn-delete">x</button>
            </a>
        </div>
    <?php endforeach; ?>
    <?
    //Конвертируем массив для передачи его в телеграм
    $product_info = base64_encode(serialize($product_info));


    ?>
    <div class="cart__sum"></div>
    <form action="/thanks" class="cart__form cart-form" method="POST">
        <div class="cart-form__row">
            <label for="cart-form__name">Ваше имя</label>
            <input required type="text" class="cart-form__name cart-form__input" id="cart-form__name" name="NAME">
        </div>
        <div class="cart-form__row">
            <label for="cart-form__mail">Ваш Email</label>
            <input required type="email" class="cart-form__mail cart-form__input" id="cart-form__mail" name="EMAIL">
        </div>
        <div class="cart-form__row">
            <label for="cart-form__tel">Телефон</label>
            <input required type="tel" class="cart-form__tel cart-form__input" id="cart-form__tel" name="TEL">
        </div>
        <input type="submit" value="Заказать" class="cart-form__button">
        <input type="hidden" value="" name="PRODUCTS" class="cart-form__product-meta">
    </form>
</div>

</div>






