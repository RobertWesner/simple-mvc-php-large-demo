<?php

use App\Service\GreetingService;
use RobertWesner\SimpleMvcPhp\Route;

Route::get('/', function (GreetingService $greetingService) {
    return Route::render('index.twig', [
        'version' => Composer\InstalledVersions::getVersion('robertwesner/simple-mvc-php'),
        'diVersion' => Composer\InstalledVersions::getVersion('robertwesner/dependency-injection'),
        'greeting' => $greetingService->getGreeting(),
    ]);
});

Route::get('.*', function () {
    return Route::render('404.twig', status: 404);
});
