# Bernasoft

Bernasoft é um projeto desenvolvido em Laravel. O sistema tem como objetivo principal gerenciar máquinas, categorias e autenticação de usuários de forma simples e funcional.

---

## Funcionalidades:

- Sistema de cadastro e login de usuários: Permite que novos usuários se cadastrem e façam login no sistema com autenticação funcional.
- Sistema de adição de categorias de máquinas: Permite adicionar, visualizar e organizar categorias para as máquinas cadastradas.

## Testes realizados:

- Teste de conexão: Verifica se a aplicação consegue se conectar corretamente ao banco de dados.
- Teste de autenticação: Verifica se o sistema de login e cadastro de usuários está funcionando corretamente.

---

## Tecnologias utilizadas:

- **Laravel**
- **PHP 8.x**
- **MySQL** (ou outro banco de dados compatível)
- **Composer**

---

## Instalação e execução:

1. Clone o repositório: `git clone https://github.com/Bulletzzz/Bernasoft.git`
2. Entre na pasta do projeto: `cd bernasoft`
3. Instale as dependências: `composer install`
4. Configure o arquivo `.env` com suas credenciais do banco de dados.
5. Gere a chave do Laravel: `php artisan key:generate`
6. Execute as migrations para criar as tabelas no banco: `php artisan migrate`
7. (Opcional) Execute os seeders, se houver: `php artisan db:seed`
8. Rode o servidor local: `php artisan serve`
9. Acesse a aplicação no navegador em `http://127.0.0.1:8000`

---

## Execução dos testes:

Para rodar os testes já implementados, use: `php artisan test`. Isso irá executar os testes de conexão e autenticação.

---

## Estrutura do projeto:

- `app/Models` contém os modelos do Laravel
- `app/Http/Controllers` contém os controladores
- `database/migrations` contém as migrations do banco
- `database/seeders` contém os seeders (se houver)
- `routes/web.php` contém as rotas do sistema

---

## Autores:

- Bernardo Küster Ragugnetti
- Pedro Henrique Moreira
- Guilherme Barbosa

---

## Observações:

Este projeto foi desenvolvido com fins acadêmicos. Futuras funcionalidades podem incluir gerenciamento completo das máquinas, relatórios e melhorias na interface do usuário.
