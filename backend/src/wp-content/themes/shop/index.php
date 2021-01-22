<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop
 */

get_header();
?>
<section class="main" id="main">
    <div class="main__header">Торговое оборудование по выгодным ценам</div>
    <div class="main__text">Оборудование для вашего бизнеса</div>
    <!--    <img src="img/scroll_arrow.svg"class="main__arrow" alt="">-->

</section>
<section class="products" id="products">
    <div class="products__header">
        <h1 class="product__heading">Торговое оборудование</h1>
        <p class="product__description">Принтер чеков, кассовых лент, POS-терминалы</p>
    </div>
    <div class="products__container">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 100,
        );

        $all_product = array();
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :
            $loop->the_post();
            global $product;;
            $link_product = get_permalink($product->get_id()) ?>
            <form method="GET" class="product-card" action="<?php echo $link_product ?>">
                <a href="<?php echo $link_product ?>">
                    <img class="product-card__image" alt=""
                         src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>">
                </a>

                <div class="product-card__name"><?php echo $product->get_title() ?></div>
                <div class="product-card__description"><?php echo $product->get_short_description() ?></div>
                <div class="product-card__price"><?php echo $product->get_price_html() ?></div>
                <a class="product-card__add-cart" href="?add-to-cart=<?php echo $product->get_id() ?>">
                    В корзину
                </a>

            </form>
        <?php endwhile; ?>
    </div>
</section>
<section class="instruction" id="instruction">
    <div class="instruction__header">Как сделать заказ</div>
    <div class="instruction__item-wrapper">
        <div class="instruction__item">
            <img src="/wp-content/uploads/2021/01/ico1.jpg" alt="" class="instruction__image">
            <div class="instruction__text">
                Положите заказ в корзину или оставьте заявку в форме обратной связи
            </div>
        </div>
        <img src="/wp-content/uploads/2021/01/arrow.jpg" alt="" class="instruction__arrow">
        <div class="instruction__item">
            <img src="/wp-content/uploads/2021/01/ico2.jpg" alt="" class="instruction__image">
            <div class="instruction__text">Наш менеджер свяжется с вами для согласования заказа</div>
        </div>
        <img src="/wp-content/uploads/2021/01/arrow.jpg" alt="" class="instruction__arrow">
        <div class="instruction__item">
            <img src="/wp-content/uploads/2021/01/ico3.jpg" alt="" class="instruction__image">
            <div class="instruction__text">Мы доставим вам заказ в удобное для вас время</div>
        </div>
    </div>
</section>
<section class="question" id="question">
    <div class="question__wrapper">
        <div class="question__header">Есть вопросы? <span>Оставьте номер телефона и наш специалист свяжется с вами и ответит на все вопросы</span>
        </div>
        <form action="/thanks" class="question__form" METHOD="POST">
            <input required type="tel" name="CALLBACK-TEL" id="" class="question__form-tel" placeholder="Телефон" >
            <button class="question__form-submit">Отправить заявку</button>
        </form>
    </div>
</section>
<section class="contact" id="contact">
    <div class="contact__header">Наши контакты</div>
    <div class="contact__tel1 contact__tel">+7701 768-59-09</div>
    <div class="contact__adress"><span>Респлублика Казахстан</span><span>г.Алматы</span><span>ул. Коперника 124В офис 106</span>
    </div>
</section>
<?php

$cart_amount = WC()->cart->get_cart_contents_count();
if ($cart_amount) {
    get_template_part('template-parts/cart-icon', null, array(
            'class' => 'cart-icon',
            'data' => array(
                'amount' => $cart_amount
            ))
    );
}

//get_template_part('template-parts/cart-body');
get_footer();

?>

