<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\WeekdayRule;

/**
  *  Builds a WeekDayRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class WeekdayBuilder extends CommonBuilder
{
    /**
     *  Builds a WeekDay Rule
     *
     *  @access public
     *  @return void
     *
    */
    public function build()
    {
        $rule = new WeekdayRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
