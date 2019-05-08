<?php

return [
    'target_php_version' => '7.3',
    'directory_list' => [
        'src',
        'vendor/guzzlehttp',
        'vendor/symfony/dom-crawler',
        'vendor/psr'
    ],
    'exclude_analysis_directory_list' => [
        'vendor/'
    ],
    'plugins' => [
        'AlwaysReturnPlugin',
        'UnreachableCodePlugin',
        'DollarDollarPlugin',
        'DuplicateArrayKeyPlugin',
        'PregRegexCheckerPlugin',
        'PrintfCheckerPlugin',
    ],
];