<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\MonthlyRule;

/**
  *  Builds a Monthly
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class MonthlyBuilder extends CommonBuilder
{
    /**
     *  Builds a Monthly Rule
     *
     *  @access public
     *  @return Iterator
     *
    */
    public function build()
    {
        $rule = new MonthlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
