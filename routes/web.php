<?php

declare(strict_types=1);

use App\Service\GreetingService;
use App\Service\PhpHighlighterService;
use RobertWesner\SimpleMvcPhp\Route;

// all parameters to the function are autowired, no manual instantiation necessary
Route::get('/', function (GreetingService $greetingService, PhpHighlighterService $highlighterService) {
    return Route::render('index.twig', [
        'versions' => [
            'mvc' => Composer\InstalledVersions::getVersion('robertwesner/simple-mvc-php'),
            'di' => Composer\InstalledVersions::getVersion('robertwesner/dependency-injection'),
        ],
        'greeting' => $greetingService->getGreeting(),
        'webRoutes' => $highlighterService->hightlightFile(__FILE__),
    ]);
});

// allow /spawner and /spawner/
// all URI rules are regular expressions
Route::get('/spawner/?', function () {
    return Route::render('spawner.twig');
});

// proxy to a vendor file
Route::get('/css/highlight.css', function () {
    return Route::response(file_get_contents(__BASE_DIR__ . '/vendor/scrivo/highlight.php/styles/default.css'), headers: [
        'Content-Type' => 'text/css',
    ]);
});

// match everything else to 404
Route::get(Route::FALLBACK, function () {
    return Route::render('404.twig', status: 404);
});
