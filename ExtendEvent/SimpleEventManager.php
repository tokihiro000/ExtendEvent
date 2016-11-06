<?php
namespace ExtendEvent
{
  require_once 'EventManager.php';
  class SimpleEventManager extends EventManager
  {
    public static function run($key)
    {
      if (isset(static::$func_map[$key])){
        call_user_func(static::$func_map[$key]);
      }
    }
  }
}
