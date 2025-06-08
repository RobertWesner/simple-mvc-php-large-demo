<?php

namespace App\Service;

use Exception;
use Highlight\Highlighter;
use stdClass;

final readonly class PhpHighlighterService
{
    public function __construct(
        private Highlighter $highlighter,
    ) {}

    /**
     * @throws Exception
     */
    public function hightlightFile(string $filename): stdClass
    {
        return $this->highlighter->highlight('php', file_get_contents($filename));
    }
}
