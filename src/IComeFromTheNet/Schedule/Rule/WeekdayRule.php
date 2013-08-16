<?php
namespace IComeFromTheNet\Schedule\Rule;

use DateTime;
use DateInterval;
use LimitIterator;
use IComeFromTheNet\Schedule\Exception\ScheduleException;
use IComeFromTheNet\Schedule\WeekdayDatePeriod;

/**
  *  Weekly Rule a schedule that occurs on selected weekdays
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class WeekdayRule extends BasicRule implements RuleInterface
{
   
   
   /**
     *  Returns a configured php DatePeriod
     *
     *  @access public
     *  @return DatePeriod
     *
    */
    public function buildDatePeriod()
    {
        $object = new WeekdayDatePeriod($this->getStartDate(),$this->getInterval(),$this->getLimitation(),array(1,2,3,4,5),(boolean)$this->getStartSkiped());    
        
        if($this->getStartingOffset() > 1) {
            $object = new LimitIterator($object,$this->getStartingOffset());
        }
        
        return $object;
    }   
   
   
   /**
    * Returns interval between occurances using an instance of php DateIntervale
    *
    * @return DateInterval
    */
   public function getInterval()
   {
        return new DateInterval('P1D');
   }
   
    /**
     *  Calculate the start given offset ie number of intervals
     *
     *  @access public
     *  @return DateTime the Date of the offset
     *
    */
    public static function calculateOffsetStart($offset, DateTime $start, $skipStart = false)
    {
          throw new ScheduleException('not implemented for this rule');
    }
   
   
}
/* End of Class */
