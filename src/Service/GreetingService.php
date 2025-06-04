<?php

namespace App\Service;

use RobertWesner\SimpleMvcPhpDemoBundle\Demo\DemoInterface;

final readonly class GreetingService
{
    public function __construct(
        private DemoInterface $demo,
    ) {}

    public function getGreeting(): string
    {
        return $this->demo->greetWorld();
    }
}
