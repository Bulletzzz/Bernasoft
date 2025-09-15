<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

//Teste para verificar a verificação da autenticação do login

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

  public function test_criacao_categoria_sem_login_retorna_302(){
    
    $response = $this->post('/maquinas', ['title' => 'Categoria Falsa',]);

    $response->assertStatus(302);

    }
}