<?php

return [
    'site_title' => env('SITE_TITLE', 'DeepDocs'),
    'site_title_suffix' => '234',
    'beian_number' => env('BEIAN_NUMBER', ''),
    'copyright' => env('copyright', date('Y').' '.env('SITE_TITLE', 'DeepDocs')),
];