<?php
namespace IComeFromTheNet\Schedule\Rule;

use DateTime;
use DateInterval;
use IComeFromTheNet\Schedule\Exception\ScheduleException;

/**
  *  Weekly Rule a schedule that occurs weekly
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class WeeklyRule extends BasicRule implements RuleInterface
{
   
   /**
    * Returns interval between occurances using an instance of php DateIntervale
    *
    * @return DateInterval
    */
   public function getInterval()
   {
        return new DateInterval('P1W');
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
        if(is_integer($offset) === false) {
            throw new ScheduleException('offset must be an integer');
        }
        
        if($offset < 1) {
            throw new ScheduleException('Offset must be  > 1');
        }
        
        if((boolean)$skipStart == true) {
          $offset = ($offset + 1);
        }
        
        $newDate  = clone $start;
        $interval = 1 * ($offset - 1);
        
        # set new date  
        $newDate->modify("+ $interval weeks");
        
        return $newDate;
    }
   
   
}
/* End of Class */
