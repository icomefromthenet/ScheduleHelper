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
     *  @return void
     *
    */
    public function build()
    {
        return new BiMonthlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
    }
    
    
}
/* End of Class */
