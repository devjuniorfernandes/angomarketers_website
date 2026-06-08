<?php

namespace Tests\Feature;

use App\Models\User;
use App\Domain\Events\Models\Event;
use App\Domain\Trainings\Models\Training;
use App\Domain\Articles\Models\Article;
use App\Domain\Categories\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AngoMarketersRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Run database seeding before each test to have realistic data
        $this->seed();
    }

    /**
     * Test public pages.
     */
    public function test_public_pages_status(): void
    {
        // Homepage
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // About page
        $response = $this->get(route('about'));
        $response->assertStatus(200);

        // Contact page
        $response = $this->get(route('contact'));
        $response->assertStatus(200);

        // Sitemap.xml dynamic page
        $response = $this->get(route('sitemap'));
        $response->assertStatus(200);
        $response->assertSee('<loc>', false);
        $response->assertSee('especializacao-seo-tecnico-performance-web');

        // Robots.txt dynamic page
        $response = $this->get(route('robots'));
        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('Allow: /');
        $response->assertSee('sitemap.xml');

        // Legacy redirects
        $this->get('/news')->assertRedirect('/noticias');
        $this->get('/events')->assertRedirect('/eventos');
        $this->get('/trainings')->assertRedirect('/formacoes');
    }

    /**
     * Test Categories module.
     */
    public function test_categories_display(): void
    {
        $category = Category::first();
        $this->assertNotNull($category);

        $response = $this->get(route('category', ['slug' => $category->slug]));
        $response->assertStatus(200);
    }

    /**
     * Test search results and logging.
     */
    public function test_search_logging_and_results(): void
    {
        $response = $this->get(route('search', ['q' => 'Angola']));
        $response->assertStatus(200);

        // Assert database has search logs
        $this->assertDatabaseHas('search_logs', [
            'query' => 'angola',
            'hits' => 1,
        ]);

        // Search again for the same query
        $this->get(route('search', ['q' => 'Angola']));
        $this->assertDatabaseHas('search_logs', [
            'query' => 'angola',
            'hits' => 2,
        ]);
    }

    /**
     * Test Articles module.
     */
    public function test_articles_display_and_comments(): void
    {
        $article = Article::first();
        $this->assertNotNull($article);

        $response = $this->get(route('article', ['slug' => $article->slug]));
        $response->assertStatus(200);

        // Submit comment
        $commentData = [
            'author_name' => 'Test Commenter',
            'author_email' => 'commenter@example.com',
            'content' => 'This is a test comment content.',
        ];

        $response = $this->post(route('article.comment.store', ['slug' => $article->slug]), $commentData);
        $response->assertRedirect();
        
        // Assert comment is created in database (but not approved yet)
        $this->assertDatabaseHas('comments', [
            'article_id' => $article->id,
            'author_name' => 'Test Commenter',
            'content' => 'This is a test comment content.',
            'is_approved' => false,
        ]);
    }

    /**
     * Test Events module.
     */
    public function test_events_pages(): void
    {
        // Events Listing
        $response = $this->get(route('events.index'));
        $response->assertStatus(200);
        $response->assertSee('Angola Marketing Summit 2026');

        // Event Detail
        $event = Event::first();
        $this->assertNotNull($event);

        $response = $this->get(route('events.show', ['slug' => $event->slug]));
        $response->assertStatus(200);
        $response->assertSee($event->title);
    }

    /**
     * Test Trainings/Formações module.
     */
    public function test_trainings_pages(): void
    {
        // Trainings Listing
        $response = $this->get(route('trainings.index'));
        $response->assertStatus(200);
        $response->assertSee('Especialização em SEO Técnico e Performance Web');

        // Training Detail
        $training = Training::first();
        $this->assertNotNull($training);

        $response = $this->get(route('trainings.show', ['slug' => $training->slug]));
        $response->assertStatus(200);
        $response->assertSee($training->title);
    }

    /**
     * Test Admin authentication and dashboard.
     */
    public function test_admin_dashboard_requires_auth(): void
    {
        // Guest should be redirected to login
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_access_dashboard_after_login(): void
    {
        $admin = User::where('email', 'admin@angomarketers.com')->first();
        $this->assertNotNull($admin);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }

    /**
     * Test Admin CRUD pages.
     */
    public function test_admin_crud_pages(): void
    {
        $admin = User::where('email', 'admin@angomarketers.com')->first();
        $this->assertNotNull($admin);

        $this->actingAs($admin);

        // Articles list
        $response = $this->get(route('admin.articles.index'));
        $response->assertStatus(200);

        // Categories list
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);

        // Events list
        $response = $this->get(route('admin.events.index'));
        $response->assertStatus(200);

        // Trainings list
        $response = $this->get(route('admin.trainings.index'));
        $response->assertStatus(200);

        // Comments list
        $response = $this->get(route('admin.comments.index'));
        $response->assertStatus(200);

        // Subscribers list
        $response = $this->get(route('admin.subscribers.index'));
        $response->assertStatus(200);

        // New CRUDs & screens
        $response = $this->get(route('admin.authors.index'));
        $response->assertStatus(200);

        $response = $this->get(route('admin.tags.index'));
        $response->assertStatus(200);

        $response = $this->get(route('admin.partners.index'));
        $response->assertStatus(200);

        $response = $this->get(route('admin.slider_items.index'));
        $response->assertStatus(200);

        $response = $this->get(route('admin.menus.index'));
        $response->assertStatus(200);

        $response = $this->get(route('admin.settings.index'));
        $response->assertStatus(200);
    }
}
