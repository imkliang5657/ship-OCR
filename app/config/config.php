<?php

define('APP_ROOT', dirname(__FILE__, 2) . '/');
const URL_ROOT = 'http://localhost/public';
const SITE_NAME = '測試系統';

function loadEnv(string $filePath = APP_ROOT . '.env'): bool
{
    if (!file_exists($filePath)) {
        return false;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }

    return true;
}

loadEnv();

define('DB_TYPE', getenv('DB_TYPE') ?? 'mysql');
define('DB_HOST', getenv('DB_HOST') ?? 'localhost');
define('DB_PORT', getenv('DB_PORT') ?? '3306');
define('DB_NAME', getenv('DB_NAME') ?? 'vessel');
define('DB_USER', getenv('DB_USER') ?? 'root');
define('DB_PASS', getenv('DB_PASS') ?? '');
