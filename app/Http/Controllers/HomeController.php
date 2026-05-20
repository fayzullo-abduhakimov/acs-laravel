<?php

namespace App\Http\Controllers;

use App\Models\ArchiveNews;
use App\Models\Article;
use App\Models\Book;
use App\Models\EventProgram;
use App\Models\Location;
use App\Models\Menu;
use App\Models\PageSection;
use App\Models\ProgramDate;
use App\Models\ProgramSession;
use App\Models\Registration;
use App\Models\Section;
use App\Models\SiteSettings;
use App\Models\SocialLink;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /** Section names rendered on the home page (looked up in one query). */
    private const HOME_SECTIONS = [
        'main_hero',
        'partners_logo',
        'partners_left_text',
        'partners_right_text',
        'archive_hero',
        'archive_gallery',
        'program_header',
        'location_header',
        'location_gallery',
    ];

    public function index()
    {
        $sectionsByName = PageSection::forPageKeyed('home', self::HOME_SECTIONS);

        $programs         = EventProgram::where('status', 1)
            ->with(['tag', 'location'])
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();
        $days             = $programs->pluck('day')->unique()->values();
        $firstDay         = $days->first();
        $firstDayPrograms = $programs->where('day', $firstDay);

        $footerSettings = SiteSettings::query()
            ->whereIn('name', ['acdf', 'acdf_address', 'acdf_phone', 'acdf_email'])
            ->pluck('value', 'name');

        return view('site.index', [
            'social_links'      => SocialLink::where('status', 1)->orderBy('order_by')->get(),
            'sections'          => Section::visibility()->order()->get(),
            'books'             => Book::where('status', 1)->orderBy('order_by')->get(),
            'articles'          => Article::where('status', 1)->orderBy('order_by')->get(),
            'archive_news'      => ArchiveNews::where('status', 1)->orderBy('order_by', 'desc')->get(),
            'program_dates'     => ProgramDate::orderBy('date')->get(),
            'sessions'          => ProgramSession::orderBy('sort')->get(),
            'years'             => ArchiveNews::selectRaw('YEAR(created_at) as year')
                                       ->groupBy('year')->orderBy('year')->pluck('year'),
            'locations'         => Location::where('status', 1)->orderBy('order_by')->get(),

            'youtube_link'      => SiteSettings::where('name', 'youtube_link')->value('value') ?? '',

            'hero'              => $sectionsByName->get('main_hero'),
            'partners'          => $sectionsByName->get('partners_logo'),
            'partners_left'     => $sectionsByName->get('partners_left_text'),
            'partners_right'    => $sectionsByName->get('partners_right_text'),
            'archive_hero'      => $sectionsByName->get('archive_hero'),
            'archive_gallery'   => $sectionsByName->get('archive_gallery'),
            'program_header'    => $sectionsByName->get('program_header'),
            'location_header'   => $sectionsByName->get('location_header'),
            'location_gallery'  => $sectionsByName->get('location_gallery'),

            'programs'          => $programs,
            'days'              => $days,
            'firstDay'          => $firstDay,
            'firstDayPrograms'  => $firstDayPrograms,

            'footer_menus'      => Menu::where('status', 1)->where('position', 2)->orderBy('order_by')->get(),
            'footer_settings'   => $footerSettings,
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag('registration', [
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'email'           => 'required|email|unique:registrations,email',
            'phone'           => 'required|string',
            'address'         => 'required|string',
            'city'            => 'required|string',
            'state'           => 'nullable|string',
            'postal_code'     => 'nullable|string',
            'sources'         => 'nullable|array',
            'attendance_days' => 'nullable|array',
        ]);

        Registration::create($data);

        return back()->with('success', translator('app', 'Registration successful!'));
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email|unique:subscribers,email']);
        Subscriber::create(['email' => $request->email]);

        return back()->with('success', translator('app', 'Thank you for subscribing!'));
    }

    public function getPrograms(Request $request): JsonResponse
    {
        $day = $request->input('day');

        if (! $day) {
            return response()->json(['success' => false, 'message' => 'Day is required']);
        }

        $programs = EventProgram::where('status', 1)
            ->where('day', $day)
            ->with(['location', 'tag'])
            ->orderBy('start_time')
            ->get()
            ->map(fn ($p) => [
                'id'           => $p->id,
                'start_time'   => substr($p->start_time, 0, 5),
                'end_time'     => substr($p->end_time, 0, 5),
                'bg_color'     => $p->bg_color,
                'translations' => $this->translationsFor($p, ['title', 'description']),
                'location'     => $p->location
                    ? ['translations' => $this->translationsFor($p->location, ['title'])]
                    : null,
                'tag'          => $p->tag
                    ? ['translations' => $this->translationsFor($p->tag, ['title'])]
                    : null,
            ]);

        return response()->json(['success' => true, 'programs' => $programs]);
    }

    public function getArticle(Request $request): JsonResponse
    {
        $article = Article::where('id', $request->input('id'))->where('status', 1)->first();

        if (! $article) {
            return response()->json(['success' => false, 'message' => 'Not found']);
        }

        return response()->json([
            'success' => true,
            'article' => [
                'id'           => $article->id,
                'image'        => $article->image ? $article->image_url : null,
                'created_at'   => $article->published_date?->format('d M Y'),
                'translations' => $this->translationsFor($article, ['title', 'description', 'content']),
            ],
        ]);
    }

    public function archiveYear(Request $request): JsonResponse
    {
        $year = $request->input('year');

        if (! $year) {
            return response()->json(['success' => false, 'message' => 'Year is required']);
        }

        $archive_events = EventProgram::where('status', 10)
            ->whereYear('created_at', $year)
            ->orderBy('order_by')
            ->with(['tag', 'location'])
            ->get();

        $old_locations  = Location::where('status', 10)
            ->whereYear('created_at', $year)
            ->orderBy('order_by')
            ->get();

        $tags            = Tag::where('status', 1)->orderBy('order_by')->get();
        $sectionsByName  = PageSection::forPageKeyed('home', ['partners_logo', 'archive_hero']);
        $partners        = $sectionsByName->get('partners_logo');
        $archive_hero    = $sectionsByName->get('archive_hero');
        $years           = $this->archiveYears();

        $html = view('site._archive_content', compact(
            'archive_events',
            'old_locations',
            'tags',
            'partners',
            'archive_hero',
            'years'
        ))->with('activeYear', $year)->render();

        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Build a translations list (one row per language) for a Spatie-translatable model.
     *
     * @param  array<int, string>  $fields
     * @return array<int, array<string, mixed>>
     */
    private function translationsFor(Model $model, array $fields): array
    {
        $firstField = $fields[0];
        $languages  = array_keys($model->getTranslations($firstField));

        return collect($languages)
            ->map(fn ($lang) => array_merge(
                ['language' => $lang],
                collect($fields)->mapWithKeys(fn ($f) => [$f => $model->getTranslation($f, $lang) ?? ''])->all()
            ))
            ->values()
            ->all();
    }

    /**
     * Distinct years drawn from archived events and archived locations, sorted ascending.
     */
    private function archiveYears(): Collection
    {
        return EventProgram::where('status', 10)
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->pluck('year')
            ->merge(
                Location::where('status', 10)
                    ->selectRaw('YEAR(created_at) as year')
                    ->groupBy('year')
                    ->pluck('year')
            )
            ->unique()
            ->sort()
            ->values();
    }
}
