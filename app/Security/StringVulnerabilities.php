<?php

namespace App\Security;

class StringVulnerabilities
{
    public static function escapeString(int $string){
    	return mysql_real_escape_string($string);
    }
}
