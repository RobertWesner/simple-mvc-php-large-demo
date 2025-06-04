<?php

use RobertWesner\SimpleMvcPhp\Configuration;
use RobertWesner\SimpleMvcPhpDemoBundle\DemoBundle;
use RobertWesner\SimpleMvcPhpDemoBundle\DemoBundleConfiguration;

Configuration::BUNDLES
    ::load(
        DemoBundle::class,
        new DemoBundleConfiguration(
            greeting: 'Hi',
        ),
    );
