<?php

if (!function_exists('getRandomQuote')) {
    function getRandomQuote()
    {
        // Load th quotes from the config file
        $quotes = config('quotes');

        $quote = $quotes[array_rand($quotes)];
        // Return a random quote
        return "{$quote['quote']} - {$quote['author']}";
    }
}
