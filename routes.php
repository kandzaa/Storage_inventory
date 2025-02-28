<?php
/*
    Can add the routs and the conntroller
*/
return [
    '/' => 'IndexController@index',
    '' => 'IndexController@index',
    '/login' => 'LoginController@login',  
    '/register' => 'RegisterController@register',
    '/dashboard' => 'DashboardController@dashboard',
];