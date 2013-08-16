<?php
namespace IComeFromTheNet\Schedule\Test;

use IteratorIterator;
use Iterator;
use DatePeriod;

/**
  *  Iterator to help test custom date period iterators
  *
  *  @author Lewis Dyer <getintouch@icomefromthenet.com>
  *  @since 1.0.0
  */
class DateFormatIterator implements Iterator
{
    
    protected $innerIterator;
    
    protected $format;
    
    public function __construct($period,$format = 'Y-m-d')
    {
        if($period instanceof DatePeriod) {
            $this->innerIterator = new IteratorIterator($period);
        }
        
        $this->innerIterator = $period;
        $this->format        = $format;
    }
    
    public function current()
    {
        return $this->innerIterator->current()->format($this->format);    
    }
    
    public function key()
    {
        return $this->innerIterator->key();    
    }
    
    public function next()
    {
        return $this->innerIterator->next();
    }
    
    public function rewind()
    {
        return $this->innerIterator->rewind();
    }
    
    public function valid()
    {
        return $this->innerIterator->valid();
    }
    
}
/* End of Class */
