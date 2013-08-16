<?php
namespace IComeFromTheNet\Schedule\Test;

use DateTime;
use DateInterval;
use IComeFromTheNet\Schedule\Builder\CommonBuilder;
use IComeFromTheNet\Schedule\Builder\BiMontlyBuilder;
use IComeFromTheNet\Schedule\Builder\DailyBuilder;
use IComeFromTheNet\Schedule\Builder\MonthlyBuilder;
use IComeFromTheNet\Schedule\Builder\QuartlyBuilder;
use IComeFromTheNet\Schedule\Builder\WeeklyBuilder;
use IComeFromTheNet\Schedule\Builder\YearlyBuilder;

/**
  *  Unit test of the CommonBuilder
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class CommonBuilderTest extends \PHPUnit_Framework_TestCase
{
    
    
    
    public function testProperties()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        $builder     = $this->getMockForAbstractClass('IComeFromTheNet\Schedule\Builder\CommonBuilder');
        
        # assert Properties return fluid interface
        $this->assertEquals($builder,$builder->start($start));
        $this->assertEquals($builder,$builder->limit($stop));
        $this->assertEquals($builder,$builder->offset($offset));
        
    }
    
    public function testBiMonthlyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new BiMontlyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new BiMontlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
   
    public function testDailyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new DailyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new DailyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
    
    public function testMonthlyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new MonthlyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new MonthlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
    
    public function testQuartlyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new QuartlyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new QuartlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
    
    public function testWeeklyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new WeeklyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new WeeklyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
    
    public function testYearlyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new YearlyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $rule = $builder->build();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Rule\BasicRule',$rule);
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals($offset,$rule->getStartingOffset());
        $this->assertEquals(true,$rule->getStartSkiped());
        
        # test if defaults ok        
        $builder = new YearlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $rule = $builder->build();
        
        $this->assertEquals($stop,$rule->getLimitation());
        $this->assertEquals($start,$rule->getStartDate());
        $this->assertEquals(false,$rule->getStartSkiped());
        $this->assertEquals(1,$rule->getStartingOffset());
        
    }
    
}
/* End of Class */