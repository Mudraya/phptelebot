<?php
ini_set("log_errors", 1);
ini_set("error_log", "./tg.log");
require_once __DIR__ . '/vendor/autoload.php';
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Commands\Command;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;


$bot_api_key  = '904589468:AAHR-BW2A833I9THKE_IbXtDst6JKWTlth4';
$bot_username = 'aglaglbot';
$yourUsername = 'arctgalfa';
$chat_id = 430311918;
$text = '11';
$commands_paths = [
    __DIR__ . '/Commands/',
];
$COMMANDS_FOLDER = __DIR__.'/Commands/';
try {

    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);
//
//    Longman\TelegramBot\TelegramLog::initErrorLog(__DIR__ . "/{$bot_username}_error.log");
//    Longman\TelegramBot\TelegramLog::initDebugLog(__DIR__ . "/{$bot_username}_debug.log");
//    Longman\TelegramBot\TelegramLog::initUpdateLog(__DIR__ . "/{$bot_username}_update.log");
//    $telegram->enableLimiter();
//    $post = json_decode(Request::getInput(), true);
//    $oUpdate = new Update($post, $bot_username);
//    $message = $oUpdate->getMessage();
//    if ($message) {
//        $chat_id = $message->getChat()->getId();
//        $text = $message->getText();
//    }
//    $data = [
//        'chat_id' => $chat_id,
//        'text'    => $text,
//    ];
//    return Request::sendMessage($data);
//
//
////        // Custom commands folder
////        $telegram->addCommandsPath($COMMANDS_FOLDER);
//
////        // handle telegram webhook request
//        $telegram->handle();
    $commands = [
        '/start',
    ];
    $telegram->addCommandsPaths($commands_paths);
    $telegram->enableLimiter();
    $telegram->runCommands($commands);
//    $post = json_decode(Request::getInput());
//    $Update = new Update($post, $bot_username);
//
//    $sText = $Update->getMessage()->getText();
//    if (strpos($sText, '@'.$yourUsername) !== false || (isset($post['reply_to_message']) && $post['reply_to_message']['from']['username'] == $yourUsername)) {
//        $data = [];
//        $data['chat_id'] = $chat_id;
//        $data['text'] = 'Neue Nachricht in: '.$oMessage->getChat()->getTitle()."\n\nVon: @".$oMessage->getFrom()->getUsername()." (".$oMessage->getFrom()->getFirstName().")\nNachricht:\n".$sText;
//        return Request::sendMessage($data);
//    }
//    return Request::emptyResponse();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
//    echo $e;
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);
} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Silence is golden!
    // Uncomment this to catch log initialisation errors
//    echo $e;
}
