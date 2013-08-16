<?php
namespace IComeFromTheNet\Schedule\Builder;

use DateTime;

/**
  *  Abstract Common Builder
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0;
  */
abstract class CommonBuilder
{
    
    protected $startDate;
    
    protected $limitation;
    
    protected $sequenceOffset = 1;
    
    protected $parent;
    
    protected $skip = false;
    
    
    /**
     *  Create a Schedule Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Rule\RuleInterface
     *
    */
    abstract public function build();  
    
    
    
    /**
     *  Set the Start Date of the schedule
     *
     *  @access public
     *  @return CommonBuilder
     *
    */
    public function start(DateTime $start)
    {
        $this->startDate = $start;
        
        return $this;
    }
    
    /**
     *  Set the end date of schedule
     *
     *  @access public
     *  @return CommonBuilder
     *  @param DateTime | integer
     *
    */
    public function limit($end)
    {
        $this->limitation = $end;
        
        return $this;
    }
    
    /**
     *  Set the sequence offset i.e. late start
     *
     *  @access public
     *  @return CommonBuilder
     *
    */
    public function offset($offset)
    {
        $this->sequenceOffset = $offset;
        
        return $this;
        
    }
    
    /**
     *  Skip the starting date in the iterator
     *  e.g if bill at signup don't skip but if
     *  bill at the end of the month need to skip
     *  the first occurance at the start
     *
     *  @access public
     *  @return void
     *
    */
    public function skipStart()
    {
        $this->skip = true;
        
        return $this;
    }
    
}
/* End of Class */
