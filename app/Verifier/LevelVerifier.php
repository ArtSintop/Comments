<?php

namespace App\Verifier;

class LevelVerifier
{
    public static function verifyLevelLimit(int $max, int $current){
        return $max > $current;
    }
}
