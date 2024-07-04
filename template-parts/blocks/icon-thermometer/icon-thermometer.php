<?php
$icon = get_field('icon');
$goal = get_field('goal');
$raised = get_field('raised');
$description = get_field('description');

IconThermometer(array(
    'icon'          => $icon['url'],
    'goal'          => $goal,
    'raised'        => $raised,
    'description'   => $description
));