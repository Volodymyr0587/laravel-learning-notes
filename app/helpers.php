<?php

if (!function_exists('getRandomQuote')) {
    function getRandomQuote()
    {
        // Load th quotes from the config file
        $quotes = config('quotes');
        // Return a random quote
        $quote = $quotes[array_rand($quotes)];

        return $quote;
    }
}
