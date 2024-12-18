<?php

return [
    'paths' => ['sapdata/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'allowed_origins' => ['*'], // Ganti '*' dengan domain spesifik jika di produksi
    'allowed_headers' => ['Content-Type', 'Authorization'],
    'supports_credentials' => false,
];
