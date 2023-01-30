<?php

/**
 * @param  $status
 * @return string
 */
function spanByStatus($status): string
{
    switch (strtolower($status)) {
        case 'yes':
        case '1':
            $labelClass = 'label-success';
            $labelName = 'Active';
            break;
        case 'no';
        case '0':
            $labelClass = 'label-warning';
            $labelName = 'Inactive';
            break;
        case 'draft':
            $labelClass = 'label-info';
            $labelName = 'Draft';
            break;
        default:
            $labelClass = 'label-warning';
            $labelName = 'Pending';

    }
    return sprintf('<span class="label btn btn-flat %s">%s</span>', $labelClass, ucfirst($labelName));
}
