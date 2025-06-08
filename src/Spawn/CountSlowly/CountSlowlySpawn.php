<?php

namespace App\Spawn\CountSlowly;

use RobertWesner\SimpleMvcPhpSpawnerBundle\Spawner\SpawnConfigurationInterface;
use RobertWesner\SimpleMvcPhpSpawnerBundle\Spawner\SpawnInterface;

class CountSlowlySpawn implements SpawnInterface
{
    public const string COUNT_FILENAME = '/var/tmp/counter.txt';
    public const int MAX_LIMIT = 600;

    public function run(SpawnConfigurationInterface|CountSlowlySpawnConfiguration $configuration): void
    {
        $handle = fopen(self::COUNT_FILENAME, 'w');
        fwrite($handle, 'Started counting at ' . date('Y-d-m H:i:s') . PHP_EOL);

        for ($i = $configuration->min; $i <= min($configuration->max, self::MAX_LIMIT); $i += max($configuration->step, 1)) {
            fwrite($handle, $i . PHP_EOL);
            sleep(1);
        }

        fwrite($handle, 'Done counting at ' . date('Y-d-m H:i:s') . '... removing after 10 seconds' . PHP_EOL);
        fclose($handle);

        sleep(10);
        unlink(self::COUNT_FILENAME);
    }
}
