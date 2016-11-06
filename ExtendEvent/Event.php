<?php
namespace ExtendEvent
{
  require_once  'iEvent.php';
  require_once  'Enums/Error.php';
  abstract class Event implements iEvent
  {
    protected $func;
    protected $params;
    public function setFunc($func)
    {
      if (!is_callable($func)) {
        throw new \Exception('the functoin you set is not callable', IS_NOT_CALLABLE_EXCEPTOIN);
      }
      $this->func = $func;
    }

    public function getFunc()
    {
      return $this->func;
    }

    public function run()
    {
      if (empty($this->params)) {
        call_user_func($this->func);
      } else {
        call_user_func_array($this->func, $this->params);
      }
    }

    abstract function setParams($params);
    abstract function getParams();
  }
}
