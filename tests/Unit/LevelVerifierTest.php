<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Verifier\LevelVerifier;

class LevelVerifierTest extends TestCase
{
    /**
     * @test
     */
    public function returns_true_if_max_less_than_current()
    {
        $this->assertTrue(LevelVerifier::verifyLevelLimit(4,2));
    }

    /**
     * @test
     */
    public function returns_false_if_max_less_than_current()
    {
        $this->assertFalse(LevelVerifier::verifyLevelLimit(2,4));
    }
}
