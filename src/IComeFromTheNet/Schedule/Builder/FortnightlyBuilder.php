<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\FortnightlyRule;

/**
  *  Builds a Fortnightly
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class FortnightlyBuilder extends CommonBuilder
{
    /**
     *  Builds Fortnightly Rule
     *
     *  @access public
     *  @return Iterator
     *
    */
    public function build()
    {
        $rule = new FortnightlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
        return $rule->buildDatePeriod();
    }
    
    
}
/* End of Class */
