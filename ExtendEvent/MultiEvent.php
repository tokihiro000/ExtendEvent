<?php
namespace ExtendEvent
{
  require_once  'iEvent.php';
  require_once  'Enums/Error.php';
  abstract class MultiEvent implements iEvent
  {
    protected $func_list;
    protected $param_list;
    public function setFunc($func)
    {
      if (!is_callable($func)) {
        throw new \Exception('the functoin you set is not callable', IS_NOT_CALLABLE_EXCEPTOIN);
      }
      $this->func_list[] = $func;
    }

    public function getFunc()
    {
      return $this->func_list;
    }

    public function run()
    {
      if (empty($this->param_list)) {
        foreach ($this->func_list as $func) {
          call_user_func($func);
        }
      } else {
        call_user_func_array($this->func, $this->params);
      }
    }

    abstract function setParams($params);
    abstract function getParams();
  }
}
