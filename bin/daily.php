<?php

use \DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;


$start = new DateTime();
$reoccurance = 12;

$builder = new ScheduleBuilder();

return $builder->daily()
        ->start($start)
        ->limit($reoccurance)
        ->skipStart()
        ->build();
        