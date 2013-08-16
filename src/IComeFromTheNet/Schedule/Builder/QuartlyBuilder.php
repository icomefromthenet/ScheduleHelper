<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\QuartlyRule;

/**
  *  Builds a QuartlyRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class QuartlyBuilder extends CommonBuilder
{
    /**
     *  Builds a Daily Rule
     *
     *  @access public
     *  @return iterator
     *
    */
    public function build()
    {
        $rule = new QuartlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
