<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$settings = \App\Models\SiteSettings::whereIn('name', ['acdf', 'acdf_address', 'acdf_phone', 'acdf_email'])
    ->pluck('value', 'name');
echo "Footer settings:\n";
foreach ($settings as $k => $v) {
    echo "  $k = $v\n";
}

$menus = \App\Models\Menu::where('status', 1)->where('position', 2)->orderBy('order_by')->get();
echo "\nFooter menus count: " . $menus->count() . "\n";

$social = \App\Models\SocialLink::where('status', 1)->orderBy('order_by')->get();
echo "Social links count: " . $social->count() . "\n";
