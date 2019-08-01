<?php

namespace Subscriber;

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
        // Millions
        if ($subscriberCountPrefix = strstr($subscriberCount, 'M', true)) {
            return intval($subscriberCountPrefix . "000000");
        }

        // Thousands
        if ($subscriberCountPrefix = strstr($subscriberCount, 'K', true)) {
            $subscriberCountPrefix = str_replace('.', '', $subscriberCountPrefix, $decimal);
            return intval($subscriberCountPrefix . (($decimal) ? "00" : "000"));
        }

        // Less than a Thousand (default)
        return intval($subscriberCount);
    }
}