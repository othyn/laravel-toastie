<?php

declare(strict_types=1);

namespace Othyn\Toastie\Helpers;

/**
 * Various pathing related helpers.
 */
final class Path
{
    /**
     * Helper for the base directory for all the supplimentary package stuff.
     */
    public const PACKAGE_RESOURCES = __DIR__.'/../../resources';

    /**
     * Takes path chunks and merges them together into one string, ignoring empty and placing slashes between chunks.
     */
    public static function mergeChunks(string ...$chunks): string
    {
        return Str::mergeChunks('/', ...$chunks);
    }

    /**
     * Small helper to build a file path rooted in the projects resource directory.
     */
    public static function inResoures(string $relativePath): string
    {
        return static::mergeChunks(static::PACKAGE_RESOURCES, $relativePath);
    }
}
