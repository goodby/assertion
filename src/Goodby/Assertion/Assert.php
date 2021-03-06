<?php

namespace Goodby\Assertion;

use InvalidArgumentException;

class Assert
{
    /**
     * @param string $value
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentNotEmpty($value, $message = null)
    {
        if (empty($value)) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * @param number $number
     * @param number $minimum
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentAtLeast($number, $minimum, $message = null)
    {
        if ($number < $minimum) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * @param string|array $value
     * @param int $minimum
     * @param null $message
     * @throws InvalidArgumentException
     */
    public static function argumentLengthAtLeast($value, $minimum, $message = null)
    {
        if (is_array($value)) {
            $length = count($value);
        } else {
            $length = strlen($value);
        }

        if ($length < $minimum) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * @param callable $function
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentObligates(callable $function, $message = null)
    {
        if ($function() === true) {
            return;
        }

        throw new InvalidArgumentException($message);
    }

    /**
     * @param string $class
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentClassExists($class, $message = null)
    {
        if (class_exists($class) === false) {
            throw new InvalidArgumentException(str_replace('%class%', $class, $message));
        }
    }

    /**
     * @param string $class
     * @param string $parent
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentSubclassOf($class, $parent, $message = null)
    {
        if (is_subclass_of($class, $parent) === false) {
            throw new InvalidArgumentException(str_replace('%parent%', $parent, $message));
        }
    }

    /**
     * @param object $value
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentIsObject($value, $message = null)
    {
        if (is_object($value) === false) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * @param bool $value
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentBool($value, $message = null)
    {
        if (is_bool($value) === false) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * @param callable|bool $callableOrBoolean
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentThat($callableOrBoolean, $message = null)
    {
        if (is_callable($callableOrBoolean)) {
            if ($callableOrBoolean() === false) {
                throw new InvalidArgumentException($message);
            }
        } elseif (is_bool($callableOrBoolean)) {
            if ($callableOrBoolean === false) {
                throw new InvalidArgumentException($message);
            }
        }
    }

    /**
     * @param callable|bool $callableOrBoolean
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function argumentNotThat($callableOrBoolean, $message = null)
    {
        if (is_callable($callableOrBoolean)) {
            if ($callableOrBoolean() === true) {
                throw new InvalidArgumentException($message);
            }
        } elseif (is_bool($callableOrBoolean)) {
            if ($callableOrBoolean === true) {
                throw new InvalidArgumentException($message);
            }
        }
    }
}
