<?php

declare(strict_types=1);

namespace Othyn\Toastie\Helpers;

/**
 * Various string related helpers.
 */
final class Str
{
    /**
     * Takes string chunks and merges them together into one string, ignoring empty strings.
     */
    public static function mergeChunks(string $glue, string ...$chunks): string
    {
        $chunks = array_filter(
            $chunks,
            function ($chunk) {
                return !empty($chunk);
            }
        );

        $chunks = array_map(
            function ($chunk) {
                return trim($chunk);
            },
            $chunks
        );

        return implode($glue, $chunks);
    }
}
