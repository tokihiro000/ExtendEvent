<?php
namespace ExtendEvent
{
  abstract class EventManager
  {
    protected static $func_map = [];

    public static function register($key, $func)
    {
      static::$func_map[$key] = $func;
    }

    public static function unregister($key)
    {
      if (isset(static::$func_map[$key])) {
        unset(static::$func_map[$key]);
      }
    }

    public static function clear()
    {
      static::$func_map = [];
    }

    abstract static function run($key);
  }
}
