<?php declare(strict_types=1);

namespace InhereLab\DemoPkgTest;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use ReflectionMethod;
use RuntimeException;
use Throwable;

/**
 * Class BaseTestCase
 *
 * @package InhereLab\DemoPkgTest
 */
abstract class BaseTestCase extends TestCase
{

    /**
     * get method for test protected and private method
     *
     * usage:
     *
     * ```php
     * $rftMth = $this->method(SomeClass::class, $protectedOrPrivateMethod)
     *
     * $obj = new SomeClass();
     * $ret = $rftMth->invokeArgs($obj, $invokeArgs);
     * ```
     *
     * @param string|object $class
     * @param string $method
     *
     * @return ReflectionMethod
     * @throws ReflectionException
     */
    protected static function getMethod($class, string $method): ReflectionMethod
    {
        // $class  = new \ReflectionClass($class);
        // $method = $class->getMethod($method);

        $refMth = new ReflectionMethod($class, $method);
        $refMth->setAccessible(true);

        return $refMth;
    }

    /**
     * @param callable $cb
     * @param mixed ...$args
     *
     * @return Throwable
     */
    protected function runAndGetException(callable $cb, ...$args): Throwable
    {
        try {
            $cb(...$args);
        } catch (Throwable $e) {
            return $e;
        }

        return new RuntimeException('NO ERROR', -1);
    }
}
