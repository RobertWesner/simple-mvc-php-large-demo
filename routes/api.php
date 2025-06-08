<?php

declare(strict_types=1);

use App\Spawn\CountSlowly\CountSlowlySpawn;
use App\Spawn\CountSlowly\CountSlowlySpawnConfiguration;
use RobertWesner\SimpleMvcPhp\Route;
use RobertWesner\SimpleMvcPhp\Routing\Request;
use RobertWesner\SimpleMvcPhpSpawnerBundle\Spawner\Spawner;

Route::post('/api/spawner/start-count', function (Request $request, Spawner $spawner) {
    if (file_exists(CountSlowlySpawn::COUNT_FILENAME)) {
        return Route::response('Retry later', 409);
    }

    $min = $request->getRequestParameter('min');
    $max = $request->getRequestParameter('max');
    $step = $request->getRequestParameter('step', 1);
    if ($min === null || $max === null) {
        return Route::json([
            'error' => 'Missing required min or max.',
        ], 400);
    }

    $spawner->spawn(CountSlowlySpawn::class, new CountSlowlySpawnConfiguration((int)$min, (int)$max, (int)$step));

    return Route::response('', 204);
});

Route::get('/api/spawner/count', function () {
    if (!file_exists(CountSlowlySpawn::COUNT_FILENAME)) {
        return Route::response('', 204);
    }

    return Route::response(file_get_contents(CountSlowlySpawn::COUNT_FILENAME), headers: [
        'Content-Type' => 'text/plain',
    ]);
});
