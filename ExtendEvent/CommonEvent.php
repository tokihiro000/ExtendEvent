<?php
namespace ExtendEvent
{
  require_once  'Event.php';
  require_once  'Enums/Error.php';
  class CommonEvent extends Event
  {
    public function __construct($func, ...$params)
    {
      if (!is_callable($func)) {
        throw new \Exception('the functoin you set is not callable', IS_NOT_CALLABLE_EXCEPTOIN);
      }
      $this->func = $func;
      // ネスト配列は1次元に戻す
      $new_params = [];
      if (!empty($params)) {
        array_walk_recursive($params, function($p) use (&$new_params) {
          $new_params[] = $p;
        });
      }
      $this->params = $new_params;
    }

    public function setParams($params) {
      $this->params = $params;
    }

    public function getParams() {
      $this->params;
    }
  }
}
