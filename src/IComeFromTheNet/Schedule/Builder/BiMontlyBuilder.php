<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\BiMonthlyRule;

/**
  *  Builds a BiMonthlyRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class BiMontlyBuilder extends CommonBuilder
{
    /**
     *  Builds a BiMonthly Rule
     *
     *  @access public
     *  @return Iterator
     *
    */
    public function build()
    {
        $rule = new BiMonthlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
