<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\DailyRule;

/**
  *  Builds a DailyRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class DailyBuilder extends CommonBuilder
{
    /**
     *  Builds a Daily Rule
     *
     *  @access public
     *  @return Iterator
     *
    */
    public function build()
    {
        $rule = new DailyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
