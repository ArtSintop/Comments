<?php

namespace App\Verifier;

class LevelVerifier
{
    public function verifyLevelLimit(int $max, int $current){
        return $max > $current;
    }
}
