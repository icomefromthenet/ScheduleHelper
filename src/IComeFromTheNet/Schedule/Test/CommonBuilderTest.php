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
use IComeFromTheNet\Schedule\Builder\WeekdayBuilder;
use IComeFromTheNet\Schedule\Builder\FortnightlyBuilder;
use IComeFromTheNet\Schedule\ScheduleBuilder;

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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        # test if defaults ok        
        $builder = new BiMontlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        # test if defaults ok        
        $builder = new DailyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        # test if defaults ok        
        $builder = new MonthlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        
        # test if defaults ok        
        $builder = new QuartlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
       
        
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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        # test if defaults ok        
        $builder = new WeeklyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
       
        
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
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
        
        # test if defaults ok        
        $builder = new YearlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
    }
    
    
    public function testWeekdayBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new WeekdayBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
     
        
        # test if defaults ok        
        $builder = new WeekdayBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
    }
    
     public function testFortnightlyBuilder()
    {
        $format   = 'Y-m-d';
        $start    = DateTime::createFromFormat($format,'2013-01-01');
        $stop     = DateTime::createFromFormat($format,'2014-01-01');
        $offset   = 3;
        
        $builder = new FortnightlyBuilder();
        
        $builder->limit($stop);
        $builder->start($start);
        $builder->offset($offset);
        $builder->skipStart();
        
        $iterator = $builder->build();
        
        $this->assertInstanceOf('Iterator',$iterator);
     
        
        # test if defaults ok        
        $builder = new FortnightlyBuilder();
        $builder->limit($stop);
        $builder->start($start);
        $iterator = $builder->build();
        
    }
    
    
    public function testCreateOnScheduleBuilder()
    {
        $builder = new ScheduleBuilder();
        
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\BiMontlyBuilder',$builder->create('bimonthly'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\DailyBuilder',$builder->create('daily'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\MonthlyBuilder',$builder->create('monthly'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\QuartlyBuilder',$builder->create('quartly'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\WeeklyBuilder',$builder->create('weekly'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\YearlyBuilder',$builder->create('yearly'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\WeekdayBuilder',$builder->create('weekday'));
        $this->assertInstanceOf('IComeFromTheNet\Schedule\Builder\FortnightlyBuilder',$builder->create('fortnightly'));
        
    }
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Unknown schedule rule at ab
    */
    public function testCreateOnScheduleBuilderExceptionBadString()
    {
        $builder = new ScheduleBuilder();
        $builder->create('ab');
    }
    
     /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Financial year starting day must be and integer between 1 and 31
    */
    public function testFiscalYearExceptionDayOutofRange()
    {
        $now    = new DateTime('2012-01-02');
        $struct = ScheduleBuilder::financialYear($now,32,6);
    }
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Financial year starting day must be and integer between 1 and 31
    */
    public function testFiscalYearExceptionDayNotInit()
    {
        $now    = new DateTime('2012-01-02');
        $struct = ScheduleBuilder::financialYear($now,'a',6);
    }
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Financial year starting month must be and integer between 1 and 12
    */
    public function testFiscalYearExceptionMonthNotInit()
    {
        $now    = new DateTime('2012-01-02');
        $struct = ScheduleBuilder::financialYear($now,1,'a');
    }
    
    /**
     * @expectedException IComeFromTheNet\Schedule\Exception\ScheduleException
     * @expectedExceptionMessage Financial year starting month must be and integer between 1 and 12
    */
    public function testFiscalYearExceptionMonthOutOfRange()
    {
        $now    = new DateTime('2012-01-02');
        $struct = ScheduleBuilder::financialYear($now,1,0);
    }
    
    public function testFiscalYearScheduleBuilder()
    {
        
        $now    = new DateTime('2012-01-02');
        $struct = ScheduleBuilder::financialYear($now,1,6);
        
        $this->assertEquals('2011-06-01',$struct[0]->format('Y-m-d'));
        $this->assertEquals('2012-05-31',$struct[1]->format('Y-m-d'));
        
        # test with now being start of fiscal year
        $now    = new DateTime('2011-06-01');
        $struct = ScheduleBuilder::financialYear($now,1,6);
        
        $this->assertEquals('2011-06-01',$struct[0]->format('Y-m-d'));
        $this->assertEquals('2012-05-31',$struct[1]->format('Y-m-d'));
        
        # test with now being end of fiscal year
        $now    = new DateTime('2012-05-31');
        $struct = ScheduleBuilder::financialYear($now,1,6);
        
        $this->assertEquals('2011-06-01',$struct[0]->format('Y-m-d'));
        $this->assertEquals('2012-05-31',$struct[1]->format('Y-m-d'));
        
        # test with future date
        $now    = new DateTime('2030-07-31');
        $struct = ScheduleBuilder::financialYear($now,1,6);
        
        $this->assertEquals('2030-06-01',$struct[0]->format('Y-m-d'));
        $this->assertEquals('2031-05-31',$struct[1]->format('Y-m-d'));
    }
    
    
}
/* End of Class */