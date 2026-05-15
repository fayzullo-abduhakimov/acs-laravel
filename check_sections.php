<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$sections = \App\Models\Section::orderBy('id')->get(['id','name','is_opened','status']);
foreach ($sections as $s) {
    echo $s->id . ' | ' . $s->name . ' | is_opened=' . $s->is_opened . ' | status=' . $s->status . "\n";
}
