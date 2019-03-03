<?php
// 用于存放自定义函数

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}