<?php
namespace IComeFromTheNet\Schedule;


use IComeFromTheNet\Schedule\Builder\BiMontlyBuilder;
use IComeFromTheNet\Schedule\Builder\DailyBuilder;
use IComeFromTheNet\Schedule\Builder\MonthlyBuilder;
use IComeFromTheNet\Schedule\Builder\WeeklyBuilder;
use IComeFromTheNet\Schedule\Builder\YearlyBuilder;
use IComeFromTheNet\Schedule\Builder\QuartlyBuilder;
use IComeFromTheNet\Schedule\Builder\WeekdayBuilder;

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
     *  @return 
     *
    */
    public function createBiMonthlySchedule()
    {
        return new BiMontlyBuilder();
    }
    
    
    public function createDailySchedule()
    {
        return new DailyBuilder();
    }
    
    public function createMonthlySchedule()
    {
        return new MonthlyBuilder();
    }
    
    public function createQuartlySchedule()
    {
        return new QuartlyBuilder();
    }
    
    public function createWeeklySchedule()
    {
        return new WeeklyBuilder();
    }
    
    public function createWeekDaySchedule()
    {
        return new WeekdayBuilder();
    }
    
    public function createYearlySchedule()
    {
        return new YearlyBuilder();
    }
}
/* End of Class */
