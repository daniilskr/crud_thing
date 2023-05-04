<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

/**
 * @property string $title
 */
class Book extends Model
{
    use HasFactory,
        Concerns\HasRules;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Rules that specify validation rules for values of columns
     */
    protected static function getValueRules(): array
    {
        return [
            'author_id' => ['integer', Rule::exists(Author::class, 'id')],
            'title' => 'string|max:256',
        ];
    }

    public static function getCreateRules(): array
    {
        return self::mergeRulesets(
            [
                'author_id' => 'required',
                'title' => ['required', Rule::unique(self::class)],
            ],
            self::getValueRules(),
        );
    }

    public static function getUpdateRules(?self $model): array
    {
        return self::mergeRulesets(
            [
                'title' => self::uniqueExcept($model),
            ],
            self::getValueRules(),
        );
    }
}
