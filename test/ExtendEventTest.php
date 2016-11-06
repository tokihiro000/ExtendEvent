<?php
require_once 'ExtendEvent/ExtendEventManager.php';

\ExtendEvent\ExtendEventManager::register('key', function() {
  echo 'key func'.PHP_EOL;
});
\ExtendEvent\ExtendEventManager::run('key');

\ExtendEvent\ExtendEventManager::register('key2', function(int $num1, int $num2) {
  echo $num1 + $num2 . PHP_EOL;
},1,2);
\ExtendEvent\ExtendEventManager::run('key2');


\ExtendEvent\ExtendEventManager::register('key3', function(int $num1, int $num2) {
  echo $num1 + $num2 . PHP_EOL;
});
\ExtendEvent\ExtendEventManager::setParams('key3', 1, 2);
\ExtendEvent\ExtendEventManager::run('key3');

require_once 'ExtendEvent/CommonEvent.php';
$content = 'hogehogehogehgoe';
$event = new \ExtendEvent\CommonEvent(function ($prefix, $suffix) use ($content) {
  echo $prefix.'_'.$content.'_'.$suffix.PHP_EOL;
}, 'event', 'old');
\ExtendEvent\ExtendEventManager::register('key4', $event);
\ExtendEvent\ExtendEventManager::run('key4');

// require_once 'ExtendEvent/ListEvent.php';
// $content = 'hogehogehogehgoe';
// $event = new \ExtendEvent\ListEvent(function ($prefix, $suffix) use ($content) {
//   echo $prefix.'_'.$content.'_'.$suffix;
// }, 'event', 'old');
// \ExtendEvent\ExtendEventManager::register('key5', $event);
// \ExtendEvent\ExtendEventManager::run('key5');
