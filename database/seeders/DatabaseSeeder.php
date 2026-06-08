<?php

namespace Database\Seeders;

use App\Models\User;
use App\Domain\Categories\Models\Category;
use App\Domain\Articles\Models\Author;
use App\Domain\Articles\Models\Article;
use App\Domain\Articles\Models\Comment;
use App\Domain\Newsletter\Models\Subscriber;
use App\Domain\Events\Models\Event;
use App\Domain\Events\Models\EventPhoto;
use App\Domain\Trainings\Models\Training;
use App\Domain\Trainings\Models\TrainingCategory;
use App\Domain\Core\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User for the CMS Dashboard
        User::updateOrCreate(
            ['email' => 'admin@angomarketers.com'],
            [
                'name' => 'Admin AngoMarketers',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Create Categories
        $categoriesData = [
            ['name' => 'Marketing', 'description' => 'Estratégias de marca, branding, publicidade e canais digitais.'],
            ['name' => 'Tecnologia', 'description' => 'Hardware, infraestrutura de rede, cibersegurança e telecomunicações.'],
            ['name' => 'IA', 'description' => 'Inteligência Artificial, aprendizado de máquina e automação inteligente.'],
            ['name' => 'Negócios', 'description' => 'Macroeconomia, investimentos privados, turismo e banca nacional.'],
            ['name' => 'Startups', 'description' => 'Ecossistema empreendedor, venture capital e inovações financeiras.'],
            ['name' => 'Podcast', 'description' => 'Conversas em áudio com especialistas sobre tendências do ecossistema.'],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['name']] = Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);
        }

        // 3. Create Authors
        $authorsData = [
            [
                'name' => 'Sandra Neto',
                'role' => 'Diretora Editorial & IA Lead',
                'avatar_path' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=150',
                'bio' => 'Sandra é jornalista e consultora de tecnologia com foco em Inteligência Artificial e ética de dados.',
            ],
            [
                'name' => 'Mateus Cambando',
                'role' => 'Editor de Startups & VC',
                'avatar_path' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=150',
                'bio' => 'Mateus acompanha o ecossistema empreendedor africano, analisando rondas de capital de risco e fintechs.',
            ],
            [
                'name' => 'Telma Bernardo',
                'role' => 'Chefe de Redação & Marketing',
                'avatar_path' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=150',
                'bio' => 'Telma coordena a linha de marketing estratégico, tendências de branding e publicidade corporativa.',
            ],
            [
                'name' => 'Redação',
                'role' => 'Redação AngoMarketers',
                'avatar_path' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=150',
                'bio' => 'A equipa de redação da AngoMarketers produz reportagens especiais, coberturas de eventos e comunicados corporativos.',
            ]
        ];

        $authors = [];
        foreach ($authorsData as $auth) {
            $authors[$auth['name']] = Author::create([
                'name' => $auth['name'],
                'slug' => Str::slug($auth['name']),
                'avatar_path' => $auth['avatar_path'],
                'role' => $auth['role'],
                'bio' => $auth['bio'],
                'facebook_url' => '#',
                'twitter_url' => '#',
                'linkedin_url' => '#',
            ]);
        }

        // 4. Create Tags
        $tagsData = ['Luanda', 'SEO', 'Startups', 'Fintech', 'Branding', 'IA', 'Webinar', 'Angola'];
        $tags = [];
        foreach ($tagsData as $tagName) {
            $tags[$tagName] = Tag::create([
                'name' => $tagName,
                'slug' => Str::slug($tagName),
            ]);
        }

        // 5. Create Articles
        $articlesData = [
            [
                'title' => 'Startups Angolanas Captam Volume Recorde de Investimento de Capital de Risco no Primeiro Semestre de 2026',
                'subtitle' => 'O ecossistema angolano de tecnologia demonstra amadurecimento acelerado com investimentos liderados por fundos regionais e internacionais.',
                'body' => "O ecossistema tecnológico de Angola está a viver um momento histórico...",
                'image_path' => 'https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=1200',
                'author_name' => 'Mateus Cambando',
                'category_name' => 'Startups',
                'reading_time' => '7 min',
                'featured' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Como a Inteligência Artificial está a Redefinir a Fraude Bancária em Luanda',
                'subtitle' => 'Análise do impacto de sistemas cognitivos e Machine Learning na proteção de transações financeiras nos bancos comerciais de Luanda.',
                'body' => "Os bancos comerciais em Luanda estão a investir milhões em sistemas de proteção antifraude baseados em inteligência artificial...",
                'image_path' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800',
                'author_name' => 'Sandra Neto',
                'category_name' => 'IA',
                'reading_time' => '5 min',
                'featured' => false,
                'published_at' => now()->subDay(),
            ],
            [
                'title' => '5 Estratégias de Marketing de Conteúdo para PMEs Angolanas sem Orçamento',
                'subtitle' => 'Como criar uma presença digital marcante, atrair clientes orgânicos e fidelizar o público local sem depender de anúncios pagos.',
                'body' => "Para as pequenas e médias empresas em Angola, a publicidade digital paga pode representar um investimento incomportável...",
                'image_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800',
                'author_name' => 'Telma Bernardo',
                'category_name' => 'Marketing',
                'reading_time' => '4 min',
                'featured' => true,
                'published_at' => now()->subDays(2),
            ]
        ];

        foreach ($articlesData as $art) {
            $article = Article::create([
                'title' => $art['title'],
                'slug' => Str::slug($art['title']),
                'subtitle' => $art['subtitle'],
                'body' => $art['body'],
                'image_path' => $art['image_path'],
                'author_id' => $authors[$art['author_name']]->id,
                'category_id' => $categories[$art['category_name']]->id,
                'reading_time' => $art['reading_time'],
                'status' => 'published',
                'featured' => $art['featured'],
                'views_count' => rand(100, 2500),
                'published_at' => $art['published_at'],
                'meta_title' => $art['title'],
                'meta_description' => $art['subtitle'],
                'og_image' => $art['image_path'],
            ]);

            // Sync some tags
            $article->tags()->sync([$tags['Angola']->id, $tags['Luanda']->id]);
        }

        // 6. Comments
        $firstArticle = Article::first();
        if ($firstArticle) {
            Comment::create([
                'article_id' => $firstArticle->id,
                'author_name' => 'João Brandão',
                'author_email' => 'joao@example.com',
                'content' => 'Excelente artigo. O mercado angolano realmente precisa de mais foco em Venture Capital.',
                'is_approved' => true,
            ]);
        }

        // 7. Subscriber
        Subscriber::create([
            'whatsapp' => '+244923000000'
        ]);

        // 8. Events
        $event1 = Event::create([
            'title' => 'Angola Marketing Summit 2026',
            'slug' => 'angola-marketing-summit-2026',
            'description' => 'O maior encontro anual de profissionais de marketing, publicidade e branding de Angola.',
            'body' => 'O Angola Marketing Summit regressa em 2026 para debater as novas fronteiras da comunicação de marca...',
            'image_path' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800',
            'event_date' => now()->addMonths(2)->setHour(9)->setMinute(0),
            'location' => 'Hotel Epic Sana, Luanda',
            'registration_link' => 'https://angolamarketingsummit.com',
            'status' => 'published',
            'featured' => true,
            'organizer' => 'AngoMarketers Eventos',
            'ticket_price' => 25000.00,
            'capacity' => 300,
            'views_count' => rand(150, 1200),
            'published_at' => now(),
        ]);
        $event1->tags()->sync([$tags['Angola']->id, $tags['Branding']->id]);

        $event2 = Event::create([
            'title' => 'Fórum de Comunicação de Luanda 2025',
            'slug' => 'forum-comunicacao-luanda-2025',
            'description' => 'O resumo do encontro histórico de marcas angolanas que decorreu no final de 2025.',
            'body' => 'O Fórum de Comunicação de Luanda de 2025 reuniu mais de 300 participantes...',
            'image_path' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800',
            'event_date' => now()->subMonths(6)->setHour(14)->setMinute(0),
            'location' => 'Talatona Convention Centre, Luanda',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'status' => 'published',
            'featured' => false,
            'organizer' => 'Luanda Comunica',
            'ticket_price' => 0.00,
            'capacity' => 500,
            'views_count' => rand(300, 2000),
            'published_at' => now()->subMonths(6),
        ]);
        $event2->tags()->sync([$tags['Luanda']->id]);

        // 9. Training Categories
        $tCat1 = TrainingCategory::create(['name' => 'Marketing Digital', 'slug' => 'marketing-digital']);
        $tCat2 = TrainingCategory::create(['name' => 'Tecnologia & Programação', 'slug' => 'tecnologia-programacao']);
        $tCat3 = TrainingCategory::create(['name' => 'Inteligência Artificial', 'slug' => 'inteligencia-artificial']);

        // 10. Trainings
        $tr1 = Training::create([
            'title' => 'Especialização em SEO Técnico e Performance Web',
            'slug' => 'especializacao-seo-tecnico-performance-web',
            'excerpt' => 'Domine técnicas avançadas de otimização nos motores de busca com foco em mercados de conectividade reduzida.',
            'description' => 'Este treinamento prático abordará os fundamentos técnicos de SEO, como Web Vitals, otimização de renderização no servidor, compressão de imagens inteligente, tags Open Graph estruturadas e auditoria de indexação em dispositivos móveis.',
            'cover_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800',
            'institution' => 'AngoMarketers Academy',
            'instructor' => 'Telma Bernardo',
            'duration' => '40 Horas',
            'price' => 45000.00,
            'location' => 'Online & Presencial (Híbrido)',
            'mode' => 'híbrido',
            'registration_link' => 'https://angomarketers.com/academy',
            'start_date' => now()->addWeeks(4),
            'end_date' => now()->addWeeks(8),
            'featured' => true,
            'status' => 'published',
            'views_count' => rand(50, 800),
            'meta_title' => 'Especialização em SEO Técnico | AngoMarketers Academy',
            'meta_description' => 'Aprenda a otimizar sites para velocidade e motores de busca.',
        ]);
        $tr1->categories()->sync([$tCat1->id, $tCat2->id]);
        $tr1->tags()->sync([$tags['SEO']->id, $tags['Angola']->id]);

        $tr2 = Training::create([
            'title' => 'Introdução à Inteligência Artificial para Gestores de Marketing',
            'slug' => 'introducao-ia-gestores-marketing',
            'excerpt' => 'Aprenda a usar ferramentas generativas e prompts estruturados para acelerar a sua produtividade e campanhas.',
            'description' => 'Uma formação focada no uso prático do ChatGPT, Midjourney e ferramentas cognitivas aplicadas ao copywriting, automatização de relatórios de tráfego, design de campanhas e análise inteligente de audiência no mercado nacional.',
            'cover_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800',
            'institution' => 'Cognitiva Angola',
            'instructor' => 'Sandra Neto',
            'duration' => '12 Horas',
            'price' => 15000.00,
            'location' => 'Online',
            'mode' => 'online',
            'registration_link' => 'https://cognitiva.ao/marketing-ia',
            'start_date' => now()->addWeeks(2),
            'end_date' => now()->addWeeks(3),
            'featured' => true,
            'status' => 'published',
            'views_count' => rand(120, 1500),
            'meta_title' => 'IA para Marketing | Cognitiva',
            'meta_description' => 'Aprenda IA aplicada ao marketing estratégico.',
        ]);
        $tr2->categories()->sync([$tCat1->id, $tCat3->id]);
        $tr2->tags()->sync([$tags['IA']->id, $tags['Luanda']->id]);

        // 11. Seed Dynamic Settings
        \App\Domain\Core\Models\Setting::set('homepage_video_url', 'https://youtu.be/GyxYCgc3jmM');
        \App\Domain\Core\Models\Setting::set('homepage_video_show', '1');
        \App\Domain\Core\Models\Setting::set('ad_super_billboard_image', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1200');
        \App\Domain\Core\Models\Setting::set('ad_super_billboard_url', 'https://angomarketers.com/publicidade');
        \App\Domain\Core\Models\Setting::set('ad_super_billboard_show', '1');
        \App\Domain\Core\Models\Setting::set('ad_slim_leaderboard_image', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800');
        \App\Domain\Core\Models\Setting::set('ad_slim_leaderboard_url', 'https://angomarketers.com/publicidade');
        \App\Domain\Core\Models\Setting::set('ad_slim_leaderboard_show', '1');
        \App\Domain\Core\Models\Setting::set('system_site_name', 'AngoMarketers');
        \App\Domain\Core\Models\Setting::set('system_site_description', 'O maior portal de Marketing, Tecnologia e Negócios de Angola.');
        \App\Domain\Core\Models\Setting::set('system_contact_email', 'contacto@angomarketers.com');
        \App\Domain\Core\Models\Setting::set('system_contact_whatsapp', '+244923000000');
        \App\Domain\Core\Models\Setting::set('system_facebook_url', 'https://facebook.com/angomarketers');
        \App\Domain\Core\Models\Setting::set('system_instagram_url', 'https://instagram.com/angomarketers');
        \App\Domain\Core\Models\Setting::set('system_linkedin_url', 'https://linkedin.com/company/angomarketers');

        // 12. Seed Dynamic Partners
        $partners = [
            ['name' => 'Unitel', 'logo_path' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=200', 'url' => 'https://www.unitel.ao', 'order' => 1],
            ['name' => 'BFA', 'logo_path' => 'https://images.unsplash.com/photo-1618005198143-e52834643034?q=80&w=200', 'url' => 'https://www.bfa.ao', 'order' => 2],
            ['name' => 'BAI', 'logo_path' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=200', 'url' => 'https://www.bai.ao', 'order' => 3],
        ];
        foreach ($partners as $p) {
            \App\Domain\Core\Models\Partner::create($p);
        }

        // 13. Seed Dynamic Slider Items
        $slides = [
            [
                'title' => 'Liderando o Futuro Digital em Angola',
                'subtitle' => 'Descubra as principais tendências de Marketing, Tecnologia, IA & Negócios.',
                'image_path' => 'https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=1200',
                'url' => '/noticias',
                'order' => 1,
            ],
            [
                'title' => 'Angola Marketing Summit 2026',
                'subtitle' => 'Inscreva-se no maior evento corporativo do ano em Luanda.',
                'image_path' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200',
                'url' => '/eventos/angola-marketing-summit-2026',
                'order' => 2,
            ],
        ];
        foreach ($slides as $slide) {
            \App\Domain\Core\Models\SliderItem::create($slide);
        }

        // 14. Seed Dynamic Navbar Menu Items
        $menuHome = \App\Domain\Core\Models\MenuItem::create([
            'title' => 'Início',
            'url' => '/',
            'order' => 1,
        ]);
        $menuNoticias = \App\Domain\Core\Models\MenuItem::create([
            'title' => 'Notícias',
            'url' => '/noticias',
            'order' => 2,
        ]);
        $menuEventos = \App\Domain\Core\Models\MenuItem::create([
            'title' => 'Eventos',
            'url' => '/eventos',
            'order' => 3,
        ]);
        $menuFormacoes = \App\Domain\Core\Models\MenuItem::create([
            'title' => 'Formações',
            'url' => '/formacoes',
            'order' => 4,
        ]);

        // Dynamic Submenus for Noticias
        \App\Domain\Core\Models\MenuItem::create([
            'parent_id' => $menuNoticias->id,
            'title' => 'Marketing',
            'url' => '/noticias?categoria=marketing',
            'order' => 1,
        ]);
        \App\Domain\Core\Models\MenuItem::create([
            'parent_id' => $menuNoticias->id,
            'title' => 'Tecnologia',
            'url' => '/noticias?categoria=tecnologia',
            'order' => 2,
        ]);
        \App\Domain\Core\Models\MenuItem::create([
            'parent_id' => $menuNoticias->id,
            'title' => 'IA',
            'url' => '/noticias?categoria=ia',
            'order' => 3,
        ]);
    }
}
