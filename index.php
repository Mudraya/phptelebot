<?php
include('set.php');

require_once __DIR__ . '/vendor/autoload.php';
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Commands\Command;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

$bot_api_key  = '904589468:AAHR-BW2A833I9THKE_IbXtDst6JKWTlth4';
$bot_username = 'aglaglbot';
$commands_paths = [
    __DIR__ . '/Commands/',
];
$COMMANDS_FOLDER = __DIR__.'/Commands/';
$mysql_credentials = [
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
    'database' => 'phptelebot',
];
$commands = [
    '/start',
];

try {

    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    $telegram->addCommandsPaths($commands_paths);
    // Google geocode/timezone API key for /date command
    $telegram->setCommandConfig('date', [
        'google_api_key' => 'your_google_api_key_here',
    ]);
    // OpenWeatherMap API key for /weather command
    $telegram->setCommandConfig('weather', [
        'owm_api_key' => 'your_owm_api_key_here',
    ]);
    $telegram->enableMySql($mysql_credentials);
    $telegram->enableLimiter();
    $telegram->runCommands($commands);
//    $telegram->handle();

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
