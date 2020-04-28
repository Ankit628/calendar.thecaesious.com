<?php

use Carbon\Carbon;

/**
 * @param $text
 * @return string|string[]
 */
function deSlugify($text)
{
    return str_replace('_', ' ', $text);
}

/**
 * @param $i
 * @return string
 */
function getTextClass($i)
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
//        'monthly' => 'Monthly',
//        'annually' => 'Annually',
        'custom_days' => 'Custom Days'
    ];
}

/**
 * @return array
 */
function getHumanReadableTimeFormat()
{
    return [
        'today' => 'Today',
        'tomorrow' => 'Tomorrow',
        'this_week' => 'This Week',
        'next_week' => 'Next Week',
        'this_month' => 'This Month',
        'next_month' => 'Next Month',
    ];
}

/**
 * @param $input
 * @return string|null
 */
function getDaysOfWeek($input)
{
    switch ($input) {
        case 1:
            return 'sun';
            break;
        case 2:
            return 'mon';
            break;
        case 3:
            return 'tue';
            break;
        case 4:
            return 'wed';
            break;
        case 5:
            return 'thu';
            break;
        case 6:
            return 'fri';
            break;
        case 0:
            return 'sat';
            break;
        default:
            return null;
            break;
    }
}

/**
 * @return array
 */
function getPageList()
{
    return [
        '10' => '10',
        '20' => '20',
        '30' => '30',
        '40' => '40',
        '50' => '50',
        '100' => '100',
        'all' => 'All',

    ];
}

/**
 * @param $arr
 * @param null $date
 * @return array|Carbon|int|string|null
 */
function getStringOfDates($var, $date = null)
{
    if (is_array($var)) {
        $newArr = "['";
        $newArr .= implode("','", $var);
        $newArr .= "']";
        return $newArr;
    } else {
        switch ($var) {
            case 'daily':
                return ['0', '1', '2', '3', '4', '5', '6'];
                break;
            case 'weekly':
                $intDate = Carbon::parse($date)->format('N');
                return "['".$intDate."']";
                break;
            default:
                return null;
                break;
        }
    }
}


