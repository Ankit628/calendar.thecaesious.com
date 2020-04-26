<?php

use Illuminate\Support\Facades\File;

/**
 * @param $text
 * @return bool|false|string|string[]|null
 */
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n\a';
    }
    return $text;
}

function underscoreSlug($text)
{
// replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '_', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '_');
    // remove duplicate -
    $text = preg_replace('~-+~', '_', $text);
    if (empty($text)) {
        return 'n\a';
    }
    return $text;
}

/**
 * @param $newPath
 * @param $oldPath
 * @param $slug
 * @return bool
 */
function createFreshFiles($newPath, $oldPath, $slug)
{
    if (!File::exists($newPath . '/' . $slug))
        File::copyDirectory($oldPath, $newPath . '/' . $slug);
    else
        createFreshFiles($newPath, $oldPath, $slug);
    return true;
}


/**
 * @param $i
 * @return string
 */
function getBGClass($i)
{
    switch ($i) {
        case 3:
            return 'text-danger';
            break;
        case 2:
            return 'text-warning';
            break;
        case 1:
            return 'text-success';
            break;
        default:
            return null;
            break;
    }
}

/**
 * @param $i
 * @return string
 */
function getBGColor($i)
{
    switch ($i) {
        case 3:
            return '#e74a3b';
            break;
        case 2:
            return '#f6c23e';
            break;
        case 1:
            return '#1cc88a';
            break;
        default:
            return null;
            break;
    }
}

/**
 * @return array
 */
function getHumanReadableTimePeriods()
{
    return [
        'null' => 'None',
        'daily' => 'Daily',
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
        'annually' => 'Annually',
        'custom_days' => 'Custom Days'
    ];
}


