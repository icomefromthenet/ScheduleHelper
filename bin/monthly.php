<?php

use \DateTime;
use IComeFromTheNet\Schedule\ScheduleBuilder;


$start = new DateTime();
$reoccurance = 12;

$builder = new ScheduleBuilder();

return $builder->monthly()
        ->start($start)
        ->limit($reoccurance)
        ->build();
        