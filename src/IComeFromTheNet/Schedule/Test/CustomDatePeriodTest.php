<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use DateInterval;
use IComeFromTheNet\Schedule\WeekdayDatePeriod;
use IComeFromTheNet\Schedule\CustomDateInterval;
use IComeFromTheNet\Schedule\Test\DateFormatIterator;

/**
  *  Unit test of custom Date Period
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class CustomDatePeriodTest extends \PHPUnit_Framework_TestCase
{
    
    
    public function testUsingDateStopAndUsingStartingValue()
    {
        $start  = DateTime::createFromFormat('Y-m-d','2013-08-01');
        $intval = new CustomDateInterval('P1D');
        $stop   = DateTime::createFromFormat('Y-m-d','2013-08-10');
        $period = new WeekdayDatePeriod($start,$intval,$stop, array(1,2,3,4,5),false);
        
       
        $this->assertEquals(array('2013-08-01','2013-08-02','2013-08-05','2013-08-06','2013-08-07','2013-08-08','2013-08-09'),
                            iterator_to_array(new DateFormatIterator($period)));
        
    } 
    
    public function testUsingDateStopAndNotUsingStartingValue()
    {
        $start  = DateTime::createFromFormat('Y-m-d','2013-08-01');
        $intval = new CustomDateInterval('P1D');
        $stop   = DateTime::createFromFormat('Y-m-d','2013-08-10');
        $period = new WeekdayDatePeriod($start,$intval,$stop, array(1,2,3,4,5),true);
        
       
        $this->assertEquals(array('2013-08-02','2013-08-05','2013-08-06','2013-08-07','2013-08-08','2013-08-09'),
                            iterator_to_array(new DateFormatIterator($period)));
        
    }
    
    
    public function testUsingValueStopAndUsingStartingValue()
    {
        $start  = DateTime::createFromFormat('Y-m-d','2013-08-01');
        $intval = new CustomDateInterval('P1D');
        $stop   = 8;
        $period = new WeekdayDatePeriod($start,$intval,$stop, array(1,2,3,4,5),false);
        
       
        $this->assertEquals(array('2013-08-01','2013-08-02','2013-08-05','2013-08-06','2013-08-07','2013-08-08','2013-08-09','2013-08-12'),
                            iterator_to_array(new DateFormatIterator($period)));
        
    }
    
    public function testUsingValueStopAndNotUsingStartingValue()
    {
        $start  = DateTime::createFromFormat('Y-m-d','2013-08-01');
        $intval = new CustomDateInterval('P1D');
        $stop   = 8;
        $period = new WeekdayDatePeriod($start,$intval,$stop, array(1,2,3,4,5),true);
        
       
          $this->assertEquals(array('2013-08-02','2013-08-05','2013-08-06','2013-08-07','2013-08-08','2013-08-09','2013-08-12','2013-08-13'),
                            iterator_to_array(new DateFormatIterator($period)));
        
    } 
    
}