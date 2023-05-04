<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

/**
 * @property string $fullname
 */
class Author extends Model
{
    use HasFactory,
        Concerns\HasRules;

    protected $guarded = ['id'];

    protected static function booted()
    {
        self::deleted(function (self $author) {
            $author->books->each->delete();
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Rules that specify validation rules for values of columns
     */
    protected static function getValueRules(): array
    {
        return [
            'fullname' => 'string|max:256',
        ];
    }

    public static function getCreateRules(): array
    {
        return self::mergeRulesets(
            [
                'fullname' => ['required', Rule::unique(Author::class)],
            ],
            self::getValueRules(),
        );
    }

    public static function getUpdateRules(?self $model = null): array
    {
        return self::mergeRulesets(
            [
                'fullname' => self::uniqueExcept($model),
            ],
            self::getValueRules(),
        );
    }
}
