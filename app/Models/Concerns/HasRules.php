<?php

namespace App\Models\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

trait HasRules
{
    protected static function uniqueExcept(?self $model): Unique
    {
        return Rule::unique(self::class)->when($model, fn (Unique $rule, self $modelToIgnore) => $rule->ignore($modelToIgnore));
    }

    /**
     * Only string-based rulesets are supported. Arrays are not implemented
     * 
     * @param string[] ...$rulesets
     */
    protected static function mergeRulesets(...$rulesets): array
    {
        $merged = array_shift($rulesets);

        $rulesetToArray = function ($ruleset): array {
            return match (true) {
                is_array($ruleset) => $ruleset,
                is_string($ruleset) => explode('|', $ruleset),
                default => [$ruleset],      
            };
        };

        while ($toMerge = array_shift($rulesets)) {
            foreach ($toMerge as $column => $rules) {
                if (isset($merged[$column])) {
                    $mergedRules  = $rulesetToArray($merged[$column]);
                    $rulesToMerge = $rulesetToArray($toMerge[$column]);

                    $merged[$column] = [...$mergedRules, ...$rulesToMerge];

                } else {
                    $merged[$column] = $rules;
                }
            }
        }

        return $merged;
    }
}