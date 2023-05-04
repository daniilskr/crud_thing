<?php

namespace Tests\Unit\Models\Concerns;

use PHPUnit\Framework\TestCase;
use App\Models\Concerns;

class HasRulesTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_merge_two_rulesets(): void
    {
        $merger = new class() {
            use Concerns\HasRules;

            public function publicMergeRulesets(...$rulesets)
            {
                return self::mergeRulesets(...$rulesets);
            }
        };

        $merged = $merger->publicMergeRulesets(
            [
                'has_appointment' => 'required',
                'appointment_date' => 'exclude_if:has_appointment,false|required',
                'doctor_name' => 'exclude_if:has_appointment,false|required',
            ],
            [
                'has_appointment' => 'boolean',
                'appointment_date' => 'date',
                'doctor_name' => 'string',
                'email' => 'sometimes|required|email',
            ],
        );

        $this->assertEquals(
            [
                'has_appointment' => ['required', 'boolean'],
                'appointment_date' => ['exclude_if:has_appointment,false', 'required', 'date'],
                'doctor_name' => ['exclude_if:has_appointment,false', 'required', 'string'],
                'email' => 'sometimes|required|email',
            ],
            $merged,
        );
    }
}
