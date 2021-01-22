<?php /* Template Name: Notification-page */ ?>
<? get_header(); ?>

    <div class="thanks-wrapper">
        <h1>Спасибо! Мы скоро свяжемся с вами</h1>
        <a href="/" class="thanks__link">Вернуться на главную страницу</a>
    </div>
<?


function sendTelegram($message) {
    $telegram_token = 'SECRET';
    $telegram_chat_id = 'CHAT_ID';
    $send_message_url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat_id>&text=$message";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $send_message_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
}

function sendEmail($message) {
    $email_to = 'andrey@petritsa.ru';
    $email_subject = "Заявка с сайта";
    wp_mail($email_to, $email_subject, message);
}




$name = $_POST['NAME'];
$email = $_POST['EMAIL'];
$tel = $_POST['TEL'];
$products = $_POST['PRODUCTS'];


if (isset($_POST['PRODUCTS'])) { //Если нужно отправить информацию о продукте на почту и в телеграмм
    //Получили массив в json
    //$products = json_decode($products);
    // Получим валидный json
    $products = (str_replace('\"', '"', $products));
    $products = json_decode($products);

    $about_client = '';
    $about_product = '';

    foreach ($products->response as $product) {
        $about_product .= "Товар: $product->name" . urlencode("\n");
        $about_product .= "Выбранное количество: $product->amount" . urlencode("\n");
        $about_product .= "Цена за штуку: $product->price" . urlencode("\n");
        $about_product .= "Сумма: $product->final_price" . urlencode("\n");
        $about_product .= "$product->product_url" . urlencode("\n");
        $about_product .= '---------------------------------------------------------------' . urlencode("\n");
    }

    $about_client .= "Имя клиента: {$_POST['NAME']}" . urlencode("\n");
    $about_client .= "Почта клиента: {$_POST['EMAIL']}" . urlencode("\n");
    $about_client .= "Телефон клиента: {$_POST['TEL']}" . urlencode("\n");

    $telegram_message = "$about_product" . "$about_client";
    $email_message = "$about_product" . "$about_client";

    sendTelegram($telegram_message);
    sendEmail($email_message);
    WC()->cart->empty_cart(); // Очистим корзину
}

if(isset($_POST['CALLBACK-TEL']) && !empty($_POST['CALLBACK-TEL']))
{
    $message = "Клиент просил позвонить по номеру: {$_POST['CALLBACK-TEL']}";
    sendTelegram($message);
    sendEmail($message);
}
?>
<? get_footer(); ?>
