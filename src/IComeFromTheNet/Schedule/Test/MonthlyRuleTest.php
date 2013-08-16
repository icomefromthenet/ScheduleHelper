<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use IComeFromTheNet\Schedule\Rule\MonthlyRule;


/**
  *  Unit test of Monthly Rule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class MonthlyRuleTest extends \PHPUnit_Framework_TestCase
{
    
    public function testIntervalReturned()
    {
        $start = new DateTime();
        $stop  = new DateTime();
        
        $rule     = new MonthlyRule($start,$stop);
        $interval = $rule->getInterval();
        
        $this->assertInstanceOf('\DateInterval',$interval);
        $this->assertEquals(1,$interval->m);
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
        $rule     = new MonthlyRule($start,$stop,0);
    }
    
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage offset must be an integer
     *
    */
    public function testCalculateOffsetStartErrorNonIntOffset()
    {
        $start = new DateTime();
        MonthlyRule::calculateOffsetStart('a',$start, false);
    }
    
    
     /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage Offset must be  > 1
     *
    */
    public function testCalculateOffsetStartErrorOffsetNegativeOrZero()
    {
        $start    = new DateTime();
        MonthlyRule::calculateOffsetStart(0,$start,false);
    }
    
    public function testCalculateOffsetStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2013-01-01',MonthlyRule::calculateOffsetStart(1,$start,false)->format('Y-m-d'));
        $this->assertEquals('2013-02-01',MonthlyRule::calculateOffsetStart(2,$start,false)->format('Y-m-d'));
    }
    
    public function testCalculateOffsetStartSkipStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2013-02-01',MonthlyRule::calculateOffsetStart(1,$start,true)->format('Y-m-d'));
        $this->assertEquals('2013-03-01',MonthlyRule::calculateOffsetStart(2,$start,true)->format('Y-m-d'));
        $this->assertEquals('2013-04-01',MonthlyRule::calculateOffsetStart(3,$start,true)->format('Y-m-d'));
    }
    
}
/* End of Class */