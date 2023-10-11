<?php

return [
    'storage' => storage_path('indexes'), // Define where to store the search indexes
    'fuzziness' => env('TNTSEARCH_FUZZINESS', true), // Optional: Enable fuzziness for search queries
    'asYouType' => false, // Optional: Enable "as you type" searching
    // Add more configuration options as needed
];