<?php

const NOT_FOUND = '404';

$__routes = [
    'welcome' => 'User@welcome',
    'login' => 'Auth@login',
    'register' => 'User@register',
    'profile'   => 'User@profile',
    'addUser'   => 'User@addUser',
    'logout'    => 'Auth@logout',
    NOT_FOUND => 'Auth@notFound'
];