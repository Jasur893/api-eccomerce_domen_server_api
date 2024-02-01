<?php

namespace App\Enums;

enum PhpMode: string {
    case PHP_MODE_CGI = 'php_mode_cgi';
    case PHP_MODE_LSAPI = 'php_mode_lsapi';
    case PHP_MODE_FCGI_NGINXFPM = 'php_mode_fcgi_nginxfpm';
    case PHP_MODE_FCGI_APACHE = 'php_mode_fcgi_apache';
    case PHP_MODE_MOD = 'php_mode_mod';
}
