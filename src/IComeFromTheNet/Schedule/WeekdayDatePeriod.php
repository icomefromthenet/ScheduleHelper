<?php
namespace IComeFromTheNet\Schedule;

use DateInterval;
use DatePeriod;
use DateTime;
use Iterator;
use IComeFromTheNet\Schedule\Exception\ScheduleException;

/**
  *  Custom Date Period
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 
  */
class WeekdayDatePeriod implements Iterator
{
    
    protected $interval;
    
    protected $startDate;
        
    protected $limit;
    
    protected $excludeStart;
    
    protected $currentDate;
    
    protected $selectedDays;

    protected $dayMap;

    protected $counter;
    
    /**
     *  Build a map of days to day names
     *
     *  @access protected
     *  @return array of day names
     *  @param  array $dates of days in the week 1-7
     *
    */
    protected function buildMap(array $dates)
    {
        $map = array();
        $dateInterval = new \DateInterval('P1D');
        $startDate = new \DateTime('next Monday');
        $datePeriod = new \DatePeriod($startDate, $dateInterval, 6);
        
        foreach ($datePeriod as $date) {
            if(in_array($date->format('N'),$dates)) {
                $map[$date->format('N')] = $date->format('l');    
            }
        };
        
        return $map;
    }
    
    /**
     *  Find the next day given set of available days and a date
     *  Requires property selectedDays to be sorted and the dayMap Property to be filled
     *  
     *  @access protected
    */
    protected function findNextClosestDay()
    {
        # value from 1 - 7
        $currentDayOfWeek = $this->currentDate->format('N');
        
        foreach($this->selectedDays as $index) {
            if ($index > $currentDayOfWeek) {
                $this->currentDate->modify('next ' . $this->dayMap[$index]);
                break;
            }
        }
        
        # are we at the end of the week, reset the date
        # will occur is the loop made no changes
        if($currentDayOfWeek === $this->currentDate->format('N')) {
            $this->currentDate->modify('next ' . $this->dayMap[1]);     
        }
    }

            
    public function __construct (DateTime $start, DateInterval $intval, $limit, array $daysOfWeek, $option = 0)
    {
        $this->currentDate   = clone $start;
        $this->startDate     = clone $start;
        $this->interval      = $intval;
        $this->limit         = $limit;
        $this->excludeStart  = (boolean) $option;
        $this->counter       = 0;
        $this->selectedDays  = $daysOfWeek;
        sort($this->selectedDays);
        
        # build a map of weekday units to names
        # need these to use in DateTime::modify('next Mon|Tue|Wed')
        $this->dayMap = $this->buildMap($this->selectedDays);
        
        # check if start date is in the list of selected values
        # if we have been asked to skip first date do it
        if (!in_array($this->startDate->format('N'), $this->selectedDays) || $this->excludeStart) {
            $this->findNextClosestDay();
        } 
       
    }
    
    
    
    /**
    * {@inheritDoc}
    */
    public function current()
    {
        return clone $this->currentDate;
    }
    
    /**
    * {@inheritDoc}
    */
    public function key()
    {
        return $this->counter;
    }
    
    /**
    * {@inheritDoc}
    */  
    public function next()
    {
        $this->findNextClosestDay();

        ++$this->counter;
        
    }
    
    /**
    * {@inheritDoc}
    */
    public function rewind()
    {
        $this->counter = 0;
        $this->currentDate = clone $this->startDate;
        
        if (!in_array($this->startDate->format('N'), $this->selectedDays) || $this->excludeStart) {
            $this->findNextClosestDay();
        } 
    }
    
    /**
    * {@inheritDoc}
    */
    public function valid()
    {
        if ($this->limit instanceof \DateTime) {
            return $this->currentDate <= $this->limit;
        } else {
            return $this->counter < $this->limit;
        }
    }
    
    
}
/* End of Class */