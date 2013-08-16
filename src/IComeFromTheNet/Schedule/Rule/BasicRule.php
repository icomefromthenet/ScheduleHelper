<?php
namespace IComeFromTheNet\Schedule\Rule;

use DateTime;
use DatePeriod;
use DateInterval;
use LimitIterator;
use IteratorIterator;
use IComeFromTheNet\Schedule\Exception\ScheduleException;

/**
  *  An Abstract Common Basic Rule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
abstract class BasicRule implements RuleInterface
{
    /*
     * @var DateTime
     */
    protected $startDate;
    
    /*
     * @var DateTime
     */
    protected $limitation;
    
    /**
     *  @var integer
     */
    protected $offset = 1;
    
   /**
     *  @var boolean
     */
    protected $skip = false;
    
    
    public function __construct(DateTime $start, $limitation , $offset = 1, $skip = false)
    {
        if((integer)$offset <= 0) {
            throw new ScheduleException('Offset must be greater than 1');
        }
        
        if(!$limitation instanceOf DateTime) {
            if((integer)$limitation <= 0) {
                throw new ScheduleException('Limitation must be integer greater than 0 or a DateTime stop date');    
            }
        }
        
  
        $this->offset     = (integer) $offset;
        $this->limitation = $limitation;
        $this->startDate  = $start;
        $this->skip       = (boolean) $skip;
    }
    
    
    /**
    * Returns maximum number of occurances or max date
    *
    * @return DateTime | integer 
    */  
    public function getLimitation()
    {
        return $this->limitation;
    }
    
    
    /**
     *  Return the starting date
     *
     *  @access public
     *  @return void
     *
    */
    public function getStartDate()
    {
        return $this->startDate;
    }
    
     /**
     *  Fetch the starting offset default 1
     *
     *  @access public
     *  @return integer 1
     *
    */
    public function getStartingOffset()
    {
        return $this->offset;
    }
    
     /**
     *  Should first value be skippedin the iterator
     *
     *  @access public
     *  @return boolean
     *
    */
    public function getStartSkiped()
    {
        return $this->skip;
    }
    
    
    /**
     *  Returns a configured php DatePeriod
     *
     *  @access public
     *  @return DatePeriod
     *
    */
    public function buildDatePeriod()
    {
        $object = null;
        
        if($this->getStartSkiped() === true) {
            $object = new IteratorIterator(new DatePeriod($this->getStartDate(),$this->getInterval(),$this->getLimitation(),DatePeriod::EXCLUDE_START_DATE));    
        } else {
            $object = new IteratorIterator(new DatePeriod($this->getStartDate(),$this->getInterval(),$this->getLimitation()));    
        }
        
        if($this->getStartingOffset() > 1) {
            $object = new LimitIterator($object,$this->getStartingOffset());
        }
        
        return $object;
    }
    
}
/* End of Class */
