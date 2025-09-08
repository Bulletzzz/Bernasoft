<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//teste de conexão padrão da página de login

class testehttp extends TestCase
{

    public function testehttp(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
