<?php

namespace Subscriber;

/**
 * Class Count
 * Parse and return a subscriber count from
 * YouTube's Public Data API
 * This handles all current and future formats
 *
 * Example:
 * Pre-August 2019 format
 * "203980239" -> (int) 203980239
 * August 2019 format
 * "2k" or "2K" -> (int) 2000
 * "2.1k" or "2.1K" -> (int) 2100
 *  ...
 * @package Subscriber
 */
class Count
{
    /**
     * Parse subscriber counts from string
     * to appropriate integer.
     * @param string $subscriberCount
     * @return int
     */
    public static function parse(string $subscriberCount): int
    {
        // Uppercase any alphabet characters
        $subscriberCount = strtoupper($subscriberCount);

        // Billions handler
        if ($subscriberCountPrefix = strstr($subscriberCount, 'B', true)) {
            return intval($subscriberCountPrefix . "000000000");
        }

        // Millions handler
        if ($subscriberCountPrefix = strstr($subscriberCount, 'M', true)) {
            return intval($subscriberCountPrefix . "000000");
        }

        // Thousands handler
        if ($subscriberCountPrefix = strstr($subscriberCount, 'K', true)) {
            $subscriberCountPrefix = str_replace('.', '', $subscriberCountPrefix, $decimal);
            return intval($subscriberCountPrefix . (($decimal) ? "00" : "000"));
        }

        // Less than a Thousand / normal numeric string handler (default)
        return intval($subscriberCount);
    }
}