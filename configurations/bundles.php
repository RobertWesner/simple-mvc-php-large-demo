<?php

use RobertWesner\SimpleMvcPhp\Configuration;
use RobertWesner\SimpleMvcPhpDemoBundle\DemoBundle;
use RobertWesner\SimpleMvcPhpDemoBundle\DemoBundleConfiguration;
use RobertWesner\SimpleMvcPhpSpawnerBundle\SpawnerBundle;

Configuration::BUNDLES
    ::load(
        DemoBundle::class,
        new DemoBundleConfiguration(
            greeting: 'Hi',
        ),
    )
    ::load(SpawnerBundle::class);
