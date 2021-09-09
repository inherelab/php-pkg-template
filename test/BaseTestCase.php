<?php declare(strict_types=1);

namespace Toolkit\PFlagTest;

use PHPUnit\Framework\TestCase;

/**
 * Class BaseTestCase
 *
 * @package Toolkit\PFlagTest
 */
abstract class BaseTestCase extends TestCase
{

    /**
     * @param callable $cb
     *
     * @return Throwable
     */
    protected function runAndGetException(callable $cb): Throwable
    {
        try {
            $cb();
        } catch (Throwable $e) {
            return $e;
        }

        return new RuntimeException('NO ERROR');
    }
}
