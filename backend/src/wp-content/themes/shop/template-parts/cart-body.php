<?php
?>

<div class="cart">
    <div class="cart__header">Ваш заказ</div>
    <div class="cart__product-wrapper">
        <div class="cart__product small-product">
            <img src="img/product.jpg" alt="" class="small-product__image">
            <span class="small-product__name">Чековый принтер RP58 USB+BLUETOOTH для WEBkassa</span>
            <div class="small-product__quantity">
                <button class="small-product__minus-btn small-product__btn">-</button>
                <div class="small-product__amount">1</div>
                <button class="small-product__plus-btn small-product__btn">+</button>
            </div>
            <div class="small-product__final-price">0</div>
            <div class="small-product__price">100</div>
            <button class="small-product__btn-delete">x</button>
        </div>
        <div class="cart__product small-product">
            <img src="img/product.jpg" alt="" class="small-product__image">
            <span class="small-product__name">2 Чековый принтер RP58 USB+BLUETOOTH для WEBkassa</span>
            <div class="small-product__quantity">
                <button class="small-product__minus-btn small-product__btn">-</button>
                <div class="small-product__amount">1</div>
                <button class="small-product__plus-btn small-product__btn">+</button>
            </div>
            <div class="small-product__final-price">0</div>
            <div class="small-product__price">200</div>
            <button class="small-product__btn-delete">x</button>
        </div>
    </div>


    <div class="cart__sum"></div>
    <form action="" class="cart__form cart-form">
        <div class="cart-form__row">
            <label for="cart-form__name">Ваше имя</label>
            <input required type="text" class="cart-form__name cart-form__input" id="cart-form__name">
        </div>
        <div class="cart-form__row">
            <label for="cart-form__mail">Ваш Email</label>
            <input required type="email" class="cart-form__mail cart-form__input" id="cart-form__mail">
        </div>
        <div class="cart-form__row">
            <label for="cart-form__tel">Телефон</label>
            <input required type="tel" class="cart-form__tel cart-form__input" id="cart-form__tel">
        </div>
        <input type="submit" value="Заказать" class="cart-form__button">
        <input type="hidden" name="product_id">
        <input type="hidden" name="product_amount">
    </form>
</div>
