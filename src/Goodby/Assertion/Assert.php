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
            $length = count($value) < $minimum;
        } else {
            $length = strlen($value);
        }

        if ($length < $minimum) {
            throw new InvalidArgumentException($message);
        }
    }
}
