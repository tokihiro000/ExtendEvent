<?php
require_once 'ExtendEvent/SimpleEventManager.php';

\ExtendEvent\SimpleEventManager::register('key', function() {
  echo 'key1 func';
});

\ExtendEvent\SimpleEventManager::run('key');
