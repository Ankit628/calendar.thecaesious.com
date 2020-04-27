<?php

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


