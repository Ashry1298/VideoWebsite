<?php

function is_active(string $routeName)
{
    if (request()->segment(2) != null && request()->segment(2) == $routeName) {
        return 'active';
    }
    return '';

    // return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '';
}
