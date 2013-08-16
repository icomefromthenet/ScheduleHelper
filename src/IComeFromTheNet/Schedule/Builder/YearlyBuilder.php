<?php
namespace IComeFromTheNet\Schedule\Builder;

use IComeFromTheNet\Schedule\Rule\YearlyRule;

/**
  *  Builds a YearlyRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class YearlyBuilder extends CommonBuilder
{
    /**
     *  Builds a Yearly Rule
     *
     *  @access public
     *  @return void
     *
    */
    public function build()
    {
        return new YearlyRule($this->startDate,$this->limitation,$this->sequenceOffset,$this->skip);
    }
    
    
}
/* End of Class */
