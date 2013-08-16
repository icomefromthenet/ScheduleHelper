<?php
namespace IComeFromTheNet\Schedule\Rule;

use \DateTime;

/**
  *  Common Interface for all Schedule Rules
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
interface RuleInterface
{
    /**
    * Returns interval between occurances using an instance of php DateIntervale
    *
    * @return DateInterval
    */
    public function getInterval();
    
    
    /**
    * Returns maximum number of occurances or max date
    *
    * @return DateTime | integer
    */  
    public function getLimitation();
        
    /**
     *  Return the starting date
     *
     *  @access public
     *  @return void
     *
    */
    public function getStartDate();
    
    /**
     *  Fetch the starting offset default 1
     *
     *  @access public
     *  @return integer 1
     *
    */
    public function getStartingOffset();
    
    /**
     *  Should first value be skippedin the iterator
     *
     *  @access public
     *  @return boolean
     *
    */
    public function getStartSkiped();
    
    /**
     *  Returns a configured php DatePeriod
     *
     *  @access public
     *  @return DatePeriod
     *  @param array $options
    */
    public function buildDatePeriod();
    
    
    /**
     *  Calculate the start given offset ie number of intervals
     *
     *  @access public
     *  @return DateTime the Date of the offset
     *
    */
    public static function calculateOffsetStart($offset, DateTime $start);
    
}
/* End of Class */