<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '904589468:AAHR-BW2A833I9THKE_IbXtDst6JKWTlth4';
$bot_username = 'aglaglbot';
$hook_url     = 'https://intense-fjord-23579.herokuapp.com/';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}
