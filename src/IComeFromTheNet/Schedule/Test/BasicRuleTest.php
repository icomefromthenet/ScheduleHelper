<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use DateInterval;
use IComeFromTheNet\Schedule\Rule\BasicRule;



/**
  *  Unit test of the BasicRule
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class BasicRuleTest extends \PHPUnit_Framework_TestCase
{
    
    
    
    public function testProperties()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        $rule     = $this->getMockForAbstractClass('IComeFromTheNet\Schedule\Rule\BasicRule',array($start,$stop,$offset,false));
        
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($offset,$rule->getStartingOffset());
        
        
    }

    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Limitation must be integer greater than 0 or a DateTime stop date
     * 
    */    
    public function testConstructorErrorIterationsOutOfRange()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = 0;
        $offset   = 3;
        $rule     = $this->getMockForAbstractClass('IComeFromTheNet\Schedule\Rule\BasicRule',array($start,$stop,$offset,false));
        
    }
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Offset must be greater than 1
     * 
    */    
    public function testConstructorErrorOffsetOutOfRange()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 0;
        $rule     = $this->getMockForAbstractClass('IComeFromTheNet\Schedule\Rule\BasicRule',array($start,$stop,$offset,false));
        
    }
    
    public function testBuildDatePeriod()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        $rule     = $this->getMockForAbstractClass('IComeFromTheNet\Schedule\Rule\BasicRule',array($start,$stop,$offset,false));
        
        $rule->expects($this->once())
             ->method('getInterval')
             ->will($this->returnValue(new DateInterval('P1M')));
        
        $period = $rule->buildDatePeriod();
        
        $this->assertInstanceOf('DatePeriod',$period);
        
        $values = array();
        
        foreach($period as $dte) {
            $values[] = $dte->format($format);
        }
        
        $this->assertEquals('2013-01-01',$values[0]);
        $this->assertEquals('2013-12-01',$values[11]);
    }
    
    
    
    
}
/* End of Class */