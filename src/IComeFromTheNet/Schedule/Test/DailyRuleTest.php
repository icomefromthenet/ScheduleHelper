<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use IComeFromTheNet\Schedule\Rule\DailyRule;


/**
  *  Unit test of Daily Rule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class DailyRuleTest extends \PHPUnit_Framework_TestCase
{
    
    public function testIntervalReturned()
    {
        $start = new DateTime();
        $stop  = new DateTime();
        
        $rule     = new DailyRule($start,$stop);
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
        $rule     = new DailyRule($start,$stop,0);
    }
    
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage offset must be an integer
     *
    */
    public function testCalculateOffsetStartErrorNonIntOffset()
    {
        $start = new DateTime();
        DailyRule::calculateOffsetStart('a',$start, false);
    }
    
    
     /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage Offset must be  > 1
     *
    */
    public function testCalculateOffsetStartErrorOffsetNegativeOrZero()
    {
        $start    = new DateTime();
        DailyRule::calculateOffsetStart(0,$start,false);
    }
    
    public function testCalculateOffsetStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2013-01-01',DailyRule::calculateOffsetStart(1,$start,false)->format('Y-m-d'));
        $this->assertEquals('2013-01-02',DailyRule::calculateOffsetStart(2,$start,false)->format('Y-m-d'));
    }
    
    public function testCalculateOffsetStartSkipStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2013-01-02',DailyRule::calculateOffsetStart(1,$start,true)->format('Y-m-d'));
        $this->assertEquals('2013-01-03',DailyRule::calculateOffsetStart(2,$start,true)->format('Y-m-d'));
        $this->assertEquals('2013-01-04',DailyRule::calculateOffsetStart(3,$start,true)->format('Y-m-d'));
    }
    
}
/* End of Class */