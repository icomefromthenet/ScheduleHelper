<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use IComeFromTheNet\Schedule\Rule\WeekdayRule;
use IComeFromTheNet\Schedule\Test\DateFormatIterator;


/**
  *  Unit test of Weekly Rule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class WeekdayRuleTest extends \PHPUnit_Framework_TestCase
{
    
    public function testIntervalReturned()
    {
        $start = new DateTime();
        $stop  = new DateTime();
        
        $rule     = new WeekdayRule($start,$stop);
        $interval = $rule->getInterval();
        
        $this->assertInstanceOf('\DateInterval',$interval);
        $this->assertEquals(1,$interval->d);
    }
    
     /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage Offset must be greater than 1
     *
    */
    public function testErrorOffsetInBadRange()
    {
        $start    = new DateTime();
        $stop     = new DateTime();
        $rule     = new WeekdayRule($start,$stop,0);
    }
    
    
     public function testBuildDatePeriod()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-08-01');
        $stop     = DateTime::createFromFormat($format,'2013-08-10');
        $offset   = 3;
        
        $rule     = new WeekdayRule($start,$stop,$offset,false);
        $p        = $rule->buildDatePeriod();
        
        $this->assertInstanceOf('LimitIterator',$p);
        $this->assertEquals(array(3 =>'2013-08-06',4=>'2013-08-07',5=>'2013-08-08',6=>'2013-08-09'),iterator_to_array(new DateFormatIterator($p)));
        
        # need to pull values in while loop as iterator_to_array calls rewind on the iterator
        $start    = DateTime::createFromFormat($format,'2013-08-01');
        $stop     = DateTime::createFromFormat($format,'2013-08-10');
        $offset   = 3;
        $rule     = new WeekdayRule($start,$stop,$offset,true);
       
        $p = $rule->buildDatePeriod();
 
        $this->assertEquals(array(3=>'2013-08-07',4=>'2013-08-08',5=>'2013-08-09'),iterator_to_array(new DateFormatIterator($p)));
    }
    
}
/* End of Class */