# AngoMarketers

Resumo em português

AngoMarketers é uma aplicação web construída com Laravel (versão 11) destinada a gerir e publicar conteúdo editorial e eventos. O projecto organiza a lógica por domínios em `app/Domain` (Articles, Categories, Events, Trainings, Newsletter, Core), oferece um frontend com Blade + Vite/Tailwind e inclui um CMS administrativo protegido por autenticação.

Principais características

- Frontend público com artigos, eventos e formações.
- Sitemap e rotas SEO (`sitemap.xml`, `robots.txt`).
- Módulo de newsletter com inscrição de subscritores.
- Sistema de comentários para artigos (submissão e aprovação pelo admin).
- Área administrativa (CRUD para artigos, categorias, eventos, formações, gestão de comentários e subscritores).
- Estrutura de código orientada por domínios em `app/Domain`.

Stack técnica

- Backend: PHP 8.4+, Laravel 11
- Frontend: Vite, Tailwind CSS, Alpine.js
- Testes: PHPUnit

Estrutura relevante

- `app/Domain` — domínios do negócio (Articles, Categories, Events, Trainings, Newsletter, Core)
- `routes/web.php` — definições de rotas públicas e administrativas
- `resources/views` — templates Blade
- `database/migrations` — migrations para a base de dados
- `tests` — suites de teste (Feature e Unit)

Instalação e arranque (desenvolvimento)

Requisitos:

- PHP >= 8.4
- Composer
- Node.js + npm
- Uma base de dados suportada (MySQL, SQLite, etc.)

Passos rápidos:

```bash
# instalar dependências PHP
composer install

# copiar ficheiro de ambiente e configurar
cp .env.example .env
php artisan key:generate

# (opcional) criar ficheiro SQLite se preferir
touch database/database.sqlite

# executar migrations e seeders
php artisan migrate --seed

# instalar dependências JS e correr Vite
npm install
npm run dev

# arrancar servidor de desenvolvimento
php artisan serve
```

Executar testes

```bash
php artisan test
# ou
vendor/bin/phpunit
```

Comandos úteis

- `php artisan migrate` — aplicar migrations
- `php artisan db:seed` — executar seeders
- `php artisan tinker` — consola interativa
- `npm run build` — build de produção dos assets

Notas de implementação

- As rotas públicas e admin estão definidas em [routes/web.php](routes/web.php).
- Sitemap gerado via view `resources/views/pages/sitemap.blade.php` e expõe artigos, eventos e formações.
- O projecto usa o pacote `laravel/pail` para processamento em background (configurado nos scripts composer).

Variáveis de ambiente importantes

- `APP_URL`, `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`

Contribuir

- Abra uma branch com o seu trabalho e submeta um pull request com descrição clara das alterações.

Licença

Este projecto não tem licença especificada no repositório; adicione um ficheiro `LICENSE` se desejar definir os termos.

---

Ficheiros úteis para começar: [routes/web.php](routes/web.php), [composer.json](composer.json), [package.json](package.json), [resources/views/pages/sitemap.blade.php](resources/views/pages/sitemap.blade.php)
