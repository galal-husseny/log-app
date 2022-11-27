<?php
function formatBytes($bytes, $precision = 2)
{
    $units = ['b', 'kb', 'mb', 'gb', 'tb'];

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= 1 << 10 * $pow;

    return round($bytes, $precision);
}

function memory_usage(){
    return formatBytes(memory_get_peak_usage());
}
