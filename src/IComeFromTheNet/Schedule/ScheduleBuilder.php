<?php
namespace IComeFromTheNet\Schedule;

use IComeFromTheNet\Schedule\Exception\ScheduleException;
use IComeFromTheNet\Schedule\Builder\BiMontlyBuilder;
use IComeFromTheNet\Schedule\Builder\DailyBuilder;
use IComeFromTheNet\Schedule\Builder\MonthlyBuilder;
use IComeFromTheNet\Schedule\Builder\WeeklyBuilder;
use IComeFromTheNet\Schedule\Builder\YearlyBuilder;
use IComeFromTheNet\Schedule\Builder\QuartlyBuilder;
use IComeFromTheNet\Schedule\Builder\WeekdayBuilder;
use IComeFromTheNet\Schedule\Builder\FortnightlyBuilder;

/**
  *  Builds A Schedule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class ScheduleBuilder
{
    /**
     *  Create a BiMonthlySchedule Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\BiMontlyBuilder
     *
    */
    public function biMonthly()
    {
        return new BiMontlyBuilder();
    }
    
    /**
     *  Create a Daily Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\DailyBuilder
     *
    */
    public function daily()
    {
        return new DailyBuilder();
    }
    
    /**
     *  Create a Monthly Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\MonthlyBuilder
     *
    */
    public function monthly()
    {
        return new MonthlyBuilder();
    }
    
    /**
     *  Create a Quartly Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\QuartlyBuilder
     *
    */
    public function quartly()
    {
        return new QuartlyBuilder();
    }
    
    /**
     *  Create a Weekly Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\WeeklyBuilder
     *
    */
    public function weekly()
    {
        return new WeeklyBuilder();
    }
    
    /**
     *  Create a Weekday Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\WeekdayBuilder
     *
    */
    public function weekday()
    {
        return new WeekdayBuilder();
    }
    
    /**
     *  Create a Yearly Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\YearlyBuilder
     *
    */
    public function yearly()
    {
        return new YearlyBuilder();
    }
    
    
    /**
     *  Create a Fortnightly Rule
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\FortnightlyBuilder
     *
    */
    public function fortnightly()
    {
        return new FortnightlyBuilder();
    }
    
    /**
     *  Create a builder from string
     *
     *  @access public
     *  @return IComeFromTheNet\Schedule\Builder\CommonBuilder
     *  @param string $name the schedule type to return.
     *
    */
    public function create($name)
    {
        $obj = null;
        
        switch($name) {
           case 'fortnightly':
            $obj = $this->fortnightly();
           break;
           case 'yearly':
            $obj = $this->yearly();
           break;
           case 'weekday':
            $obj = $this->weekday();
           break;
           case 'weekly':
            $obj = $this->weekly();
           break;
           case 'monthly':
            $obj = $this->monthly();
           break;
           case 'daily':
            $obj = $this->daily();
           break;
           case 'quartly':
            $obj = $this->quartly();
           break;
           case 'bimonthly':
            $obj = $this->biMonthly();
           break;
           default:
                throw new ScheduleException('Unknown schedule rule at '.$name);
        }
        
        
        return $obj;
    }
}
/* End of Class */
