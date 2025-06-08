<?php

namespace App\Spawn\CountSlowly;

use RobertWesner\SimpleMvcPhpSpawnerBundle\Spawner\SpawnConfigurationInterface;

final readonly class CountSlowlySpawnConfiguration implements SpawnConfigurationInterface
{
    public function __construct(
        public int $min,
        public int $max,
        public int $step,
    ) {}

    public function __serialize(): array
    {
        return [$this->min, $this->max, $this->step];
    }

    public function __unserialize(array $data): void
    {
        [$this->min, $this->max, $this->step] = $data;
    }
}
