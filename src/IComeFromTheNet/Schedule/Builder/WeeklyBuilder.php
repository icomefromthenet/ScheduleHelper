<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\WeeklyRule;

/**
  *  Builds a WeeklyRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class WeeklyBuilder extends CommonBuilder
{
    /**
     *  Builds a Weekly Rule
     *
     *  @access public
     *  @return void
     *
    */
    public function build()
    {
        return new WeeklyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
    }
    
    
}
/* End of Class */
