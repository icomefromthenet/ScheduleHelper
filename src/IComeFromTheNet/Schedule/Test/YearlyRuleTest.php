<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use IComeFromTheNet\Schedule\Rule\YearlyRule;


/**
  *  Unit test of Yearly Rule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class YearlyRuleTest extends \PHPUnit_Framework_TestCase
{
    
    public function testIntervalReturned()
    {
        $start = new DateTime();
        $stop  = new DateTime();
        
        $rule     = new YearlyRule($start,$stop);
        $interval = $rule->getInterval();
        
        $this->assertInstanceOf('\DateInterval',$interval);
        $this->assertEquals(1,$interval->y);
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
        $rule     = new YearlyRule($start,$stop,0);
    }
    
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage offset must be an integer
     *
    */
    public function testCalculateOffsetStartErrorNonIntOffset()
    {
        $start = new DateTime();
        YearlyRule::calculateOffsetStart('a',$start, false);
    }
    
    
     /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * expectedExceptionMessage Offset must be  > 1
     *
    */
    public function testCalculateOffsetStartErrorOffsetNegativeOrZero()
    {
        $start    = new DateTime();
        YearlyRule::calculateOffsetStart(0,$start,false);
    }
    
    public function testCalculateOffsetStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2013-01-01',YearlyRule::calculateOffsetStart(1,$start,false)->format('Y-m-d'));
        $this->assertEquals('2014-01-01',YearlyRule::calculateOffsetStart(2,$start,false)->format('Y-m-d'));
    }
    
    public function testCalculateOffsetStartSkipStart()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        
        $this->assertEquals('2014-01-01',YearlyRule::calculateOffsetStart(1,$start,true)->format('Y-m-d'));
        $this->assertEquals('2015-01-01',YearlyRule::calculateOffsetStart(2,$start,true)->format('Y-m-d'));
        $this->assertEquals('2016-01-01',YearlyRule::calculateOffsetStart(3,$start,true)->format('Y-m-d'));
    }
    
}
/* End of Class */