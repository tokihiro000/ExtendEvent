<?php
namespace ExtendEvent
{
 require_once 'EventManager.php';
 require_once 'CommonEvent.php';
 require_once  'Event.php';

 class ExtendEventManager extends EventManager
  {
    public static function register($key, $event, ...$params)
    {
      $is_func = is_callable($event);
      if ($is_func) {
        $event = new CommonEvent($event, $params);
      }
      assert($event instanceof \ExtendEvent\Event, 'ExtendEventManager::register could not set event that is not extend \ExtendEvent\Event');
      static::$func_map[$key] = $event;
    }

    public static function run($key)
    {
      if (isset(static::$func_map[$key])){
        static::$func_map[$key]->run();
      }
    }

    public static function setParams($key, ...$params)
    {
      if (isset(static::$func_map[$key])) {
        static::$func_map[$key]->setParams($params);
      }
    }
  }
}
