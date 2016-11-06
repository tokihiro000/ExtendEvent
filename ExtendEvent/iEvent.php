<?php
namespace ExtendEvent
{
  interface iEvent
  {
    public function setFunc($func);
    public function getFunc();
    public function run();
    public function setParams($params);
    public function getParams();
  }
}
