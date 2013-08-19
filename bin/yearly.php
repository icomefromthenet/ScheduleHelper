<?php

use \DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;


$start = new DateTime();
$reoccurance = 6;

$builder = new ScheduleBuilder();

return $builder->yearly()
        ->start($start)
        ->limit($reoccurance)
        ->build();
        