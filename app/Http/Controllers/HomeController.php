<?php

namespace App\Http\Controllers;

use App\Models\ArchiveNews;
use App\Models\Article;
use App\Models\Book;
use App\Models\EventProgram;
use App\Models\Location;
use App\Models\PageSection;
use App\Models\ProgramDate;
use App\Models\ProgramSession;
use App\Models\Registration;
use App\Models\Section;
use App\Models\SiteSettings;
use App\Models\SocialLink;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $social_links   = SocialLink::where('status', 1)->orderBy('order_by')->get();
        $hero           = PageSection::getSection('main_hero', 'home');
        $youtube_link   = SiteSettings::where('name', 'youtube_link')->value('value') ?? '';
        $sections       = Section::visibility()->order()->get();
        $books          = Book::where('status', 1)->orderBy('order_by')->get();
        $articles       = Article::where('status', 1)->orderBy('order_by')->get();
        $partners       = PageSection::getSection('partners_logo', 'home');
        $partners_left  = PageSection::getSection('partners_left_text', 'home');
        $partners_right = PageSection::getSection('partners_right_text', 'home');
        $archive_hero   = PageSection::getSection('archive_hero', 'home');
        $archive_gallery = PageSection::getSection('archive_gallery', 'home');

        $years = ArchiveNews::selectRaw('YEAR(created_at) as year')
            ->groupBy('year')->orderBy('year')->pluck('year');

        $archive_news  = ArchiveNews::where('status', 1)->orderBy('order_by', 'desc')->get();
        $program_dates = ProgramDate::orderBy('date')->get();
        $sessions      = ProgramSession::orderBy('sort')->get();

        $program_header   = PageSection::getSection('program_header', 'home');
        $location_header  = PageSection::getSection('location_header', 'home');
        $location_gallery = PageSection::getSection('location_gallery', 'home');
        $locations        = Location::where('status', 1)->orderBy('order_by')->get();

        $programs  = EventProgram::where('status', 1)->orderBy('day')->orderBy('start_time')->with(['tag', 'location'])->get();
        $days      = $programs->pluck('day')->unique()->values();
        $firstDay  = $days->first();
        $firstDayPrograms = $programs->filter(fn($p) => $p->day == $firstDay);

        $footer_menus  = Menu::where('status', 1)->where('position', 2)->orderBy('order_by')->get();
        $footer_settings = SiteSettings::whereIn('name', ['acdf', 'acdf_address', 'acdf_phone', 'acdf_email'])
            ->pluck('value', 'name');

        return view('site.index', compact(
            'social_links',
            'hero',
            'youtube_link',
            'sections',
            'books',
            'articles',
            'partners',
            'partners_left',
            'partners_right',
            'archive_hero',
            'archive_gallery',
            'years',
            'archive_news',
            'program_dates',
            'sessions',
            'program_header',
            'location_header',
            'location_gallery',
            'locations',
            'programs',
            'days',
            'firstDay',
            'firstDayPrograms',
            'footer_menus',
            'footer_settings'
        ));
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag('registration', [
            'first_name'     => 'required|string',
            'last_name'      => 'required|string',
            'email'          => 'required|email|unique:registrations,email',
            'phone'          => 'required|string',
            'address'        => 'required|string',
            'city'           => 'required|string',
            'state'          => 'nullable|string',
            'postal_code'    => 'nullable|string',
            'sources'        => 'nullable|array',
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

        if (!$day) {
            return response()->json(['success' => false, 'message' => 'Day is required']);
        }

        $programs = EventProgram::where('status', 1)
            ->where('day', $day)
            ->with(['location', 'tag'])
            ->orderBy('start_time')
            ->get()
            ->map(fn($p) => [
                'id'           => $p->id,
                'start_time'   => substr($p->start_time, 0, 5),
                'end_time'     => substr($p->end_time, 0, 5),
                'bg_color'     => $p->bg_color,
                'translations' => collect(array_keys($p->getTranslations('title')))->map(fn($lang) => [
                    'language'    => $lang,
                    'title'       => $p->getTranslation('title', $lang) ?? '',
                    'description' => $p->getTranslation('description', $lang) ?? '',
                ])->values()->toArray(),
                'location'     => $p->location ? [
                    'translations' => collect(array_keys($p->location->getTranslations('title')))->map(fn($lang) => [
                        'language' => $lang,
                        'title'    => $p->location->getTranslation('title', $lang) ?? '',
                    ])->values()->toArray(),
                ] : null,
                'tag'          => $p->tag ? [
                    'translations' => collect(array_keys($p->tag->getTranslations('title')))->map(fn($lang) => [
                        'language' => $lang,
                        'title'    => $p->tag->getTranslation('title', $lang) ?? '',
                    ])->values()->toArray(),
                ] : null,
            ]);

        return response()->json(['success' => true, 'programs' => $programs]);
    }

    public function getArticle(Request $request): JsonResponse
    {
        $article = Article::where('id', $request->input('id'))->where('status', 1)->first();

        if (!$article) {
            return response()->json(['success' => false, 'message' => 'Not found']);
        }

        return response()->json([
            'success' => true,
            'article' => [
                'id'           => $article->id,
                'image'        => $article->image ? asset('storage/' . $article->image) : null,
                'created_at'   => $article->published_date?->format('d M Y'),
                'translations' => collect(array_keys($article->getTranslations('title')))->map(fn($lang) => [
                    'language'    => $lang,
                    'title'       => $article->getTranslation('title', $lang) ?? '',
                    'description' => $article->getTranslation('description', $lang) ?? '',
                    'content'     => $article->getTranslation('content', $lang) ?? '',
                ])->values()->toArray(),
            ],
        ]);
    }

    public function archiveYear(Request $request): JsonResponse
    {
        $year = $request->input('year');

        if (!$year) {
            return response()->json(['success' => false, 'message' => 'Year is required']);
        }

        $archive_events = EventProgram::where('status', 10)
            ->whereYear('created_at', $year)
            ->orderBy('order_by')
            ->with(['tag', 'location'])
            ->get();

        $old_locations = Location::where('status', 10)
            ->whereYear('created_at', $year)
            ->orderBy('order_by')
            ->get();

        $tags         = Tag::where('status', 1)->orderBy('order_by')->get();
        $partners     = PageSection::getSection('partners_logo', 'home');
        $archive_hero = PageSection::getSection('archive_hero', 'home');

        $eventYears    = EventProgram::where('status', 10)->selectRaw('YEAR(created_at) as year')->groupBy('year')->pluck('year');
        $locationYears = Location::where('status', 10)->selectRaw('YEAR(created_at) as year')->groupBy('year')->pluck('year');
        $years         = $eventYears->merge($locationYears)->unique()->sort()->values();

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
}
