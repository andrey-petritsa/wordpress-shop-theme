$('.cart__sum').html(calculate_sum_price())
var product_info = get_all_product_info();
var product_info_json = JSON.stringify(product_info)
$('.cart-form__product-meta').val(product_info_json)

$('.small-product__btn').click(function () { //Quanaity click
    //Пересчитать количество товара в корзине
    var small_product = $(this).parent().parent()
    var quantity = small_product.children('.small-product__quantity')
    var amount = quantity.children('.small-product__amount')
    var price = small_product.children('.small-product__price')
    var final_price = small_product.children('.small-product__final-price')

    // Добавить товар при нажатаии на кнопки
    var current_button_pressed = $(this).attr('class').split(' ')[0]
    switch (current_button_pressed) {
        case 'small-product__plus-btn':
            $(amount).html(parseInt($(amount).html()) + 1)
            break
        case 'small-product__minus-btn':
            if ($(amount).html() <= 1) {
                break
            }
            $(amount).html(parseInt($(amount).html()) - 1)
            break
        default:
            console.log('error')
    }
    amountInt = parseInt(amount.html())
    priceInt = parseInt(price.html())
    var calculated_price = calculate_product_price(amountInt, priceInt)
    $(final_price).html(calculated_price)
    $('.cart__sum').html(calculate_sum_price())
    // For Notfification
    var product_info = get_all_product_info();
    var product_info_json = JSON.stringify(product_info)
    $('.cart-form__product-meta').val(product_info_json)
})

function calculate_sum_price() {
    //Пересчитать общую сумму от всех товаров
    var temp_sum = 0;
    var all_price = $('.small-product__final-price')
    all_price.each(function (index, price) {
        temp_sum += parseInt($(price).html())
    })
    return temp_sum
}

function calculate_product_price(amount, price) {
    return amount * price
}

//For telegram notification
function get_all_product_info() {
    var product = $('.small-product')
    var all_product = {}
    all_product.response = []
    product.each(function (index, product) {
        var quantity = $(product).children('.small-product__quantity')
        var amount = quantity.children('.small-product__amount').html()
        var price = $(product).children('.small-product__price').html()
        var final_price = $(product).children('.small-product__final-price').html()
        var name = $(product).children('.small-product__name').html()
        var image_url = $(product).children('.small-product__image').children('img').attr('src')

        product_object = {}
        product_object['name'] = name
        product_object['amount'] = amount
        product_object['price'] = price
        product_object['final_price'] = final_price
        product_object['product_url'] = image_url;

        all_product.response.push(product_object)
    })

    return all_product
}
get_all_product_info();

{

}



