ScheduleHelper ![Build Status](https://travis-ci.org/icomefromthenet/ScheduleHelper.png?branch=master)
==============

When working with dates and schedules, php has 2 built in helpers DateInteral and DatePeriod using these two classes will get you most of the way. There are a few things to keep in mind.

1. DatePeriod is not by default and Iterator it use Traversable interface and does not have methods like next,current,rewind.
2. You will need to match your period to DSL used in DateInterval.
3. Can't use DatePeriod to represent non liner date intervals, e.g weekdays only.
4. Still need to design a method to map between a setting and a DateInterval if you want to create it later.
5. If want to start in middle you need to skip ahead in your own code to given offset.

I wrote this helper to address these shortcomings, I use a builder that will accept a string name and returns an Iterator, during construction you may ask the iterator to skip ahead and I have implement the following common periods.

1. Yearly
2. Weekly
3. Monthly
4. Fortnightly
5. Weekday
6. BiMonthly
7. Quarterly
 

Examples
---------------
```php
use DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;

$start = new DateTime();
$reoccurance = 12;

$builder = new ScheduleBuilder();

return $builder->daily()
        ->start($start)
        ->limit($reoccurance)
        ->skipStart()
        ->build();
        
```
This create a daily schedule that limit to 12 occursions as where skip the first period. Important to note that there will be 13 occurances, if the start is not skipped. This is a feature of PHP DatePeriod when setting a limit using an integer the number is ***re-occurance after the start***. Total occurances is start + re-occurances (limit).

```php

use DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;


$start = new DateTime();
$reoccurance = 12;

$builder = new ScheduleBuilder();

return $builder->monthly()
        ->start($start)
        ->limit($reoccurance)
        ->offset(4)
        ->build();


```
This will return a monthly schedule 4 occurances in. If the starting month was August the first starting value at december. Using a LimitIterator to restrict the result set.

```php

use DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;


$start = new DateTime();
$reoccurance = 12;

$builder = new ScheduleBuilder();

return $builder->create('monthly')
        ->start($start)
        ->limit($reoccurance)
        ->build();


```
This will return a monthly schedule, the rule is defined using a string and not direct method call.
