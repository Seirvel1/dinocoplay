<?php
$recaptcha_secret = '6LcdXDUpAAAAALG2WIzm6a7twz1ERFr9-AcA6QiY';
$recaptcha_response = $_POST['g-recaptcha-response'];

$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_data = [
    'secret' => $recaptcha_secret,
    'response' => $recaptcha_response,
];

$recaptcha_options = [
    'http' => [
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'method' => 'POST',
        'content' => http_build_query($recaptcha_data),
    ],
];

$recaptcha_context = stream_context_create($recaptcha_options);
$recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
$recaptcha_result = json_decode($recaptcha_result, true);

// Возвращаем результат проверки на клиентскую сторону
echo json_encode($recaptcha_result);
?>
