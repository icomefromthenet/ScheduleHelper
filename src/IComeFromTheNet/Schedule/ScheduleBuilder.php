<?php
namespace IComeFromTheNet\Schedule;

use DateTime;
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
     *  Return the dates of the start of the fiscal year
     *
     *  @access public
     *  @return void
     *
    */
    static function financialYear(DateTime $now, $startDay, $startMonth)
    {
        
        if(!is_int($startDay) ||$startDay <= 0 || $startDay > 31) {
            throw new ScheduleException('Financial year starting day must be and integer between 1 and 31');
        }
        
        if(!is_int($startMonth) || $startMonth <= 0 || $startMonth > 12 ) {
            throw new ScheduleException('Financial year starting month must be and integer between 1 and 12');
        }
        
        # assume fiscal year is in same year as now date
        $fiscalYear = (integer) $now->format('Y');
        
        # build range of fiscal year start and end
        $fiscalYearStart = new DateTime();
        $fiscalYearStart->setTime(0,0,0);
        $fiscalYearStart->setDate($fiscalYear,$startMonth,$startDay);
    
        $fiscalYearEnd = clone $fiscalYearStart;
        $fiscalYearEnd->modify('+ 1 year');
        $fiscalYearEnd->modify('- 1 day');
        
        # range test using now date
        # if now on right (before) shift the fiscal year to the right by year
        # if now on left (after) shift the fishcal year to the left by year
        if($now < $fiscalYearStart){
            $fiscalYearStart->modify('- 1 year');
            $fiscalYearEnd->modify('- 1 year');
        } elseif ($now > $fiscalYearEnd) {
            $fiscalYearStart->modify('+ 1 year');
            $fiscalYearEnd->modify('+ 1 year');
        }
 
        return array($fiscalYearStart,$fiscalYearEnd);        
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
