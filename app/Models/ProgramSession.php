<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProgramSession extends Model
{
    use HasTranslations;

    protected $fillable = ['date_id', 'title', 'content', 'sort'];

    public array $translatable = ['title', 'content'];

    public function date(): BelongsTo
    {
        return $this->belongsTo(ProgramDate::class, 'date_id');
    }

    public function cleanContent(): string
    {
        $html = $this->content ?? '';
        if (empty($html)) {
            return '';
        }

        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<meta charset="utf-8"><body>' . $html . '</body>');
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        foreach (['page', 'section', 'layoutArea', 'column'] as $class) {
            $nodes = iterator_to_array(
                $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' {$class} ') or @class='{$class}']")
            );
            foreach ($nodes as $node) {
                $parent = $node->parentNode;
                while ($node->firstChild) {
                    $parent->insertBefore($node->firstChild, $node);
                }
                $parent->removeChild($node);
            }
        }

        $body = $doc->getElementsByTagName('body')->item(0);
        $result = '';
        foreach ($body->childNodes as $child) {
            $result .= $doc->saveHTML($child);
        }

        return $result;
    }
}
