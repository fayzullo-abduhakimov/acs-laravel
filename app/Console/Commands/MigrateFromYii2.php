<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateFromYii2 extends Command
{
    protected $signature   = 'migrate:from-yii2 {--fresh : Truncate target tables before migrating}';
    protected $description = 'Migrate data from Yii2 acs_db into Laravel acs_laravel';

    private string $srcUploads = 'C:/xampp/htdocs/acs-yii2/frontend/web/uploads';
    private string $dstStorage = 'C:/xampp/htdocs/acs-laravel/storage/app/public';

    public function handle(): int
    {
        if ($this->option('fresh')) {
            $this->freshTruncate();
        }

        $this->migrateTags();
        $this->migrateLocations();
        $this->migrateSocialLinks();
        $this->migrateSections();
        $this->migratePages();
        $this->migrateMenus();
        $this->migrateArticles();
        $this->migrateBooks();
        $this->migrateEventPrograms();
        $this->migrateArchiveNews();
        $this->migrateProgramSessions();
        $this->migrateRegistrations();
        $this->migrateSubscribers();
        $this->migrateSiteSettings();

        $this->info('Migration complete!');
        return self::SUCCESS;
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    private function yii2(): \Illuminate\Database\Connection
    {
        return DB::connection('yii2');
    }

    private function mapLang(string $lang): string
    {
        return $lang === 'ka' ? 'kk' : $lang;
    }

    /** Group translation rows by $idColumn into [ id => [lang => row] ] */
    private function groupTranslations(array $rows, string $idColumn, string $langColumn = 'language'): array
    {
        $grouped = [];
        foreach ($rows as $row) {
            $id   = $row->$idColumn;
            $lang = $this->mapLang($row->$langColumn);
            $grouped[$id][$lang] = $row;
        }
        return $grouped;
    }

    /**
     * Build a JSON-encoded translation string for one field.
     * Returns null when no translations exist.
     */
    private function jsonField(array $langRows, string $field): ?string
    {
        $result = [];
        foreach ($langRows as $lang => $row) {
            $val = $row->$field ?? null;
            if ($val !== null && $val !== '') {
                $result[$lang] = $val;
            }
        }
        return empty($result) ? null : json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /** Like jsonField() but returns '{}' instead of null (for NOT NULL JSON columns). */
    private function jsonFieldRequired(array $langRows, string $field): string
    {
        return $this->jsonField($langRows, $field) ?? '{}';
    }

    private function copyFile(string $relativeSrc, string $dstSubDir, string $filename): ?string
    {
        $src = $this->srcUploads . '/' . $relativeSrc . '/' . $filename;
        if (!file_exists($src)) {
            return null;
        }
        $dstDir = $this->dstStorage . '/' . $dstSubDir;
        if (!is_dir($dstDir)) {
            mkdir($dstDir, 0755, true);
        }
        copy($src, $dstDir . '/' . $filename);
        return $dstSubDir . '/' . $filename;
    }

    /** Try to copy the first matching file in a directory (fallback when filename mismatches). */
    private function copyAnyFile(string $srcDir, string $dstSubDir, string $extension = ''): ?string
    {
        if (!is_dir($srcDir)) return null;
        foreach (scandir($srcDir) as $f) {
            if ($f === '.' || $f === '..' || $f === 'thumbs') continue;
            if ($extension && !str_ends_with(strtolower($f), strtolower($extension))) continue;
            $dstDir = $this->dstStorage . '/' . $dstSubDir;
            if (!is_dir($dstDir)) mkdir($dstDir, 0755, true);
            copy($srcDir . '/' . $f, $dstDir . '/' . $f);
            return $dstSubDir . '/' . $f;
        }
        return null;
    }

    private function freshTruncate(): void
    {
        $this->warn('Truncating tables…');
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ([
            'subscribers', 'registrations', 'program_sessions', 'program_dates',
            'archive_news', 'event_programs', 'books', 'articles',
            'gallery_items', 'page_sections', 'pages',
            'menus', 'sections', 'social_links', 'location_images', 'locations', 'tags',
            'site_settings',
        ] as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->warn('Tables truncated.');
    }

    // ─── Tags ────────────────────────────────────────────────────────────────────

    private function migrateTags(): void
    {
        $this->info('Migrating tags…');
        $tags  = $this->yii2()->table('tags')->get();
        $trans = $this->groupTranslations(
            $this->yii2()->table('tag_translation')->get()->all(),
            'tag_id'
        );

        foreach ($tags as $tag) {
            $langRows = $trans[$tag->id] ?? [];
            DB::table('tags')->insert([
                'id'         => $tag->id,
                'title'      => $this->jsonFieldRequired($langRows, 'title'),
                'status'     => $tag->status,
                'order_by'   => $tag->order_by,
                'created_at' => $tag->created_at,
                'updated_at' => $tag->updated_at,
            ]);
        }
        $this->line('  Tags: ' . count($tags));
    }

    // ─── Locations ──────────────────────────────────────────────────────────────

    private function migrateLocations(): void
    {
        $this->info('Migrating locations…');
        $locations = $this->yii2()->table('locations')->get();
        $trans     = $this->groupTranslations(
            $this->yii2()->table('location_translation')->get()->all(),
            'location_id'
        );

        foreach ($locations as $loc) {
            $langRows = $trans[$loc->id] ?? [];
            $image    = null;
            if ($loc->image) {
                $image = $this->copyFile("images/locations/{$loc->id}", 'locations', $loc->image)
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/locations/{$loc->id}", 'locations');
            }
            DB::table('locations')->insert([
                'id'         => $loc->id,
                'name'       => $loc->name,
                'title'      => $this->jsonFieldRequired($langRows, 'title'),
                'content'    => $this->jsonField($langRows, 'content'),
                'image'      => $image,
                'status'     => $loc->status,
                'order_by'   => $loc->order_by,
                'created_at' => $loc->created_at,
                'updated_at' => $loc->updated_at,
            ]);
        }
        $this->line('  Locations: ' . count($locations));
    }

    // ─── Social Links ────────────────────────────────────────────────────────────

    private function migrateSocialLinks(): void
    {
        $this->info('Migrating social links…');
        $rows = $this->yii2()->table('social_links')->get();
        foreach ($rows as $row) {
            DB::table('social_links')->insert([
                'id'         => $row->id,
                'name'       => $row->name,
                'class'      => $row->class,
                'link'       => $row->link,
                'order_by'   => $row->order_by,
                'status'     => $row->status,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        }
        $this->line('  Social links: ' . count($rows));
    }

    // ─── Sections ────────────────────────────────────────────────────────────────

    private function migrateSections(): void
    {
        $this->info('Migrating sections…');
        $rows = $this->yii2()->table('sections')->get();
        foreach ($rows as $row) {
            DB::table('sections')->insert([
                'id'           => $row->id,
                'name'         => $row->name,
                'is_opened'    => $row->is_opened,
                'redirect_url' => $row->redirect_url,
                'status'       => $row->status,
                'created_at'   => $row->created_at,
                'updated_at'   => $row->updated_at,
            ]);
        }
        $this->line('  Sections: ' . count($rows));
    }

    // ─── Pages + PageSections + GalleryItems ─────────────────────────────────────

    private function migratePages(): void
    {
        $this->info('Migrating pages…');

        $pages     = $this->yii2()->table('pages')->get();
        $pageTrans = $this->groupTranslations(
            $this->yii2()->table('page_translations')->get()->all(),
            'page_id'
        );

        foreach ($pages as $page) {
            $langRows = $pageTrans[$page->id] ?? [];
            DB::table('pages')->insert([
                'id'               => $page->id,
                'name'             => $page->name,
                'slug'             => $page->slug,
                'title'            => $this->jsonFieldRequired($langRows, 'title'),
                'meta_title'       => $this->jsonField($langRows, 'meta_title'),
                'meta_description' => $this->jsonField($langRows, 'meta_description'),
                'created_at'       => $page->created_at,
                'updated_at'       => $page->updated_at,
            ]);
        }

        $sections = $this->yii2()->table('page_sections')->get();
        $trans    = $this->groupTranslations(
            $this->yii2()->table('page_section_translations')->get()->all(),
            'section_id'
        );

        foreach ($sections as $sec) {
            $langRows = $trans[$sec->id] ?? [];
            $image    = null;
            if ($sec->image) {
                $image = $this->copyFile("images/page-sections/{$sec->id}", 'page-sections', $sec->image)
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/page-sections/{$sec->id}", 'page-sections');
            }
            DB::table('page_sections')->insert([
                'id'         => $sec->id,
                'page_id'    => $sec->page_id,
                'name'       => $sec->name,
                'image'      => $image,
                'title'      => $this->jsonField($langRows, 'title'),
                'subtitle'   => $this->jsonField($langRows, 'subtitle'),
                'content'    => $this->jsonField($langRows, 'content'),
                'sort'       => $sec->sort,
                'created_at' => $sec->created_at,
                'updated_at' => $sec->updated_at,
            ]);
        }

        $items = $this->yii2()->table('gallery_items')->get();
        foreach ($items as $item) {
            $image = null;
            if ($item->image) {
                $image = $this->copyFile("images/page-sections/{$item->section_id}", 'gallery', $item->image)
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/page-sections/{$item->section_id}", 'gallery');
            }
            DB::table('gallery_items')->insert([
                'id'         => $item->id,
                'section_id' => $item->section_id,
                'name'       => $item->name,
                'image'      => $image ?? '',
                'sort'       => $item->sort,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }

        $this->line('  Pages: ' . count($pages) . ', Sections: ' . count($sections) . ', Gallery items: ' . count($items));
    }

    // ─── Menus ───────────────────────────────────────────────────────────────────

    private function migrateMenus(): void
    {
        $this->info('Migrating menus…');
        $menus = $this->yii2()->table('menu')->orderBy('id')->get();
        $trans = $this->groupTranslations(
            $this->yii2()->table('menu_translations')->get()->all(),
            'menu_id'
        );

        // Insert parents first, then children
        foreach ($menus->where('parent_id', null) as $menu) {
            $this->insertMenu($menu, $trans);
        }
        foreach ($menus->where('parent_id', '!=', null) as $menu) {
            $this->insertMenu($menu, $trans);
        }
        $this->line('  Menus: ' . count($menus));
    }

    private function insertMenu(object $menu, array $trans): void
    {
        $langRows = $trans[$menu->id] ?? [];
        DB::table('menus')->insert([
            'id'         => $menu->id,
            'title'      => $this->jsonFieldRequired($langRows, 'title'),
            'link'       => $menu->link,
            'position'   => $menu->position,
            'parent_id'  => $menu->parent_id,
            'order_by'   => $menu->order_by,
            'status'     => $menu->status,
            'created_at' => $menu->created_at,
            'updated_at' => $menu->updated_at,
        ]);
    }

    // ─── Articles ────────────────────────────────────────────────────────────────

    private function migrateArticles(): void
    {
        $this->info('Migrating articles…');
        $articles = $this->yii2()->table('articles')->get();
        $trans    = $this->groupTranslations(
            $this->yii2()->table('articles_translations')->get()->all(),
            'article_id'
        );

        foreach ($articles as $art) {
            $langRows = $trans[$art->id] ?? [];
            $image    = null;
            if ($art->image) {
                $image = $this->copyFile("images/articles/{$art->id}", 'articles', $art->image)
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/articles/{$art->id}", 'articles');
            }
            DB::table('articles')->insert([
                'id'             => $art->id,
                'title'          => $this->jsonFieldRequired($langRows, 'title'),
                'description'    => $this->jsonFieldRequired($langRows, 'description'),
                'content'        => $this->jsonField($langRows, 'content'),
                'image'          => $image,
                'slug'           => $art->slug,
                'order_by'       => $art->order_by,
                'status'         => $art->status,
                'published_date' => $art->published_date ?? now(),
                'created_at'     => $art->created_at,
                'updated_at'     => $art->updated_at,
            ]);
        }
        $this->line('  Articles: ' . count($articles));
    }

    // ─── Books ───────────────────────────────────────────────────────────────────

    private function migrateBooks(): void
    {
        $this->info('Migrating books…');
        $books = $this->yii2()->table('books')->get();
        $trans = $this->groupTranslations(
            $this->yii2()->table('books_translations')->get()->all(),
            'book_id'
        );

        foreach ($books as $book) {
            $langRows = $trans[$book->id] ?? [];
            $image    = null;
            $file     = null;

            if ($book->image) {
                $image = $this->copyFile("images/books/{$book->id}", 'books', $book->image)
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/books/{$book->id}", 'books', '.jpg')
                      ?? $this->copyAnyFile("{$this->srcUploads}/images/books/{$book->id}", 'books', '.png');
            }

            if ($book->file) {
                $file = $this->copyFile("files/books/{$book->id}", 'books/files', $book->file)
                     ?? $this->copyAnyFile("{$this->srcUploads}/files/books/{$book->id}", 'books/files', '.pdf');
            }

            DB::table('books')->insert([
                'id'          => $book->id,
                'author'      => $this->jsonFieldRequired($langRows, 'author'),
                'name'        => $this->jsonFieldRequired($langRows, 'name'),
                'description' => $this->jsonField($langRows, 'description'),
                'image'       => $image,
                'file'        => $file,
                'link'        => $book->link,
                'status'      => $book->status,
                'order_by'    => $book->order_by,
                'created_at'  => $book->created_at,
                'updated_at'  => $book->updated_at,
            ]);
        }
        $this->line('  Books: ' . count($books));
    }

    // ─── Event Programs ──────────────────────────────────────────────────────────

    private function migrateEventPrograms(): void
    {
        $this->info('Migrating event programs…');
        $programs = $this->yii2()->table('event_program')->get();
        $trans    = $this->groupTranslations(
            $this->yii2()->table('event_program_translation')->get()->all(),
            'event_program_id'
        );

        foreach ($programs as $prog) {
            $langRows = $trans[$prog->id] ?? [];
            DB::table('event_programs')->insert([
                'id'          => $prog->id,
                'title'       => $this->jsonField($langRows, 'title'),
                'description' => $this->jsonField($langRows, 'description'),
                'day'         => $prog->day,
                'start_time'  => $prog->start_time,
                'end_time'    => $prog->end_time,
                'tag_id'      => $prog->tag_id,
                'location_id' => $prog->location_id,
                'bg_color'    => $prog->bg_color,
                'status'      => $prog->status,
                'order_by'    => $prog->order_by,
                'created_at'  => $prog->created_at,
                'updated_at'  => $prog->updated_at,
            ]);
        }
        $this->line('  Event programs: ' . count($programs));
    }

    // ─── Archive News ────────────────────────────────────────────────────────────

    private function migrateArchiveNews(): void
    {
        $this->info('Migrating archive news…');
        $news  = $this->yii2()->table('archive_news')->get();
        $trans = $this->groupTranslations(
            $this->yii2()->table('archive_news_translation')->get()->all(),
            'news_id'
        );

        foreach ($news as $item) {
            $langRows = $trans[$item->id] ?? [];
            // Archive news images don't exist on disk — just note the filename
            DB::table('archive_news')->insert([
                'id'          => $item->id,
                'title'       => $this->jsonFieldRequired($langRows, 'title'),
                'description' => $this->jsonField($langRows, 'description'),
                'image'       => null,
                'status'      => $item->status,
                'order_by'    => $item->order_by,
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ]);
        }
        $this->line('  Archive news: ' . count($news));
    }

    // ─── Program Dates + Sessions ────────────────────────────────────────────────

    private function migrateProgramSessions(): void
    {
        $this->info('Migrating program dates & sessions…');

        $dates = $this->yii2()->table('program_date')->get();
        foreach ($dates as $date) {
            DB::table('program_dates')->insert([
                'id'         => $date->id,
                'date'       => $date->date,
                'created_at' => $date->created_at,
                'updated_at' => $date->updated_at,
            ]);
        }

        $sessions = $this->yii2()->table('program_sessions')->get();
        $trans    = $this->groupTranslations(
            $this->yii2()->table('program_sessions_translation')->get()->all(),
            'session_id'
        );

        foreach ($sessions as $session) {
            $langRows = $trans[$session->id] ?? [];
            DB::table('program_sessions')->insert([
                'id'         => $session->id,
                'date_id'    => $session->date_id,
                'title'      => $this->jsonFieldRequired($langRows, 'title'),
                'content'    => $this->jsonField($langRows, 'content'),
                'sort'       => $session->sort,
                'created_at' => $session->created_at,
                'updated_at' => $session->updated_at,
            ]);
        }

        $this->line('  Program dates: ' . count($dates) . ', Sessions: ' . count($sessions));
    }

    // ─── Registrations ───────────────────────────────────────────────────────────

    private function migrateRegistrations(): void
    {
        $this->info('Migrating registrations…');
        $rows = $this->yii2()->table('registration')->get();

        foreach ($rows as $row) {
            DB::table('registrations')->insertOrIgnore([
                'id'              => $row->id,
                'first_name'      => $row->first_name,
                'last_name'       => $row->last_name,
                'email'           => $row->email,
                'phone'           => $row->phone,
                'address'         => $row->address,
                'city'            => $row->city,
                'state'           => $row->state,
                'postal_code'     => $row->postal_code,
                'sources'         => $this->parseJsonArray($row->sources),
                'attendance_days' => $this->parseJsonArray($row->attendance_days),
                'created_at'      => $row->created_at,
                'updated_at'      => $row->updated_at,
            ]);
        }
        $this->line('  Registrations: ' . count($rows));
    }

    private function parseJsonArray(?string $value): ?string
    {
        if ($value === null || $value === '') return null;
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return is_array($decoded) ? json_encode($decoded) : json_encode([$decoded]);
        }
        return json_encode([$value]);
    }

    // ─── Subscribers ─────────────────────────────────────────────────────────────

    private function migrateSubscribers(): void
    {
        $this->info('Migrating subscribers…');
        $rows = $this->yii2()->table('subscribers')->get();

        foreach ($rows as $row) {
            DB::table('subscribers')->insertOrIgnore([
                'id'         => $row->id,
                'email'      => $row->email,
                'created_at' => $row->created_at,
            ]);
        }
        $this->line('  Subscribers: ' . count($rows));
    }

    // ─── Site Settings ───────────────────────────────────────────────────────────

    private function migrateSiteSettings(): void
    {
        $this->info('Migrating site settings…');

        $settings = $this->yii2()->table('settings')->get()->keyBy('name');
        $trans    = $this->groupTranslations(
            $this->yii2()->table('setting_translations')->get()->all(),
            'setting_id'
        );

        $settingMap = [
            'acdf'         => 'acdf',
            'acdf_address' => 'acdf_address',
            'acdf_email'   => 'acdf_email',
            'youtube_link' => 'youtube_link',
        ];

        $count = 0;
        foreach ($settingMap as $yii2Name => $laravelName) {
            $setting = $settings->get($yii2Name);
            if (!$setting) continue;

            $value = $setting->is_translatable
                ? ($trans[$setting->id]['en']->value ?? null)
                : $setting->value;

            DB::table('site_settings')->insertOrIgnore([
                'name'       => $laravelName,
                'value'      => $value,
                'created_at' => $setting->created_at,
                'updated_at' => $setting->updated_at,
            ]);
            $count++;
        }
        $this->line('  Site settings: ' . $count);
    }
}
