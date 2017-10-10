<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class SomaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void(
     */
    public function testExample()
    {           
        $true = false;        
        $this->assertFalse($true);

        $false = false;
        $this->assertFalse($false);
    }
}

