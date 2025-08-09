<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ModificationRequest;
use Carbon\Carbon;
class ModificationRequestFactory extends Factory
{
    protected $model = ModificationRequest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $submitted = Carbon::instance(
            $this->faker->dateTimeBetween('-3 years', 'now')
        );

        $status = $this->faker->randomElement(['pending', 'approved', 'rejected']);
        $approvedAt = $status === 'approved'
            ? $submitted->copy()
            ->addDays($this->faker->numberBetween(0, 14))
            ->addHours($this->faker->numberBetween(0, 23))
            ->addMinutes($this->faker->numberBetween(0, 59))
            : null;
        
        return [
            'reason'       => $this->faker->sentence(),
            'status'       => $status,
            'submitted_at' => $submitted,
            'approved_at'  => $approvedAt,
        ];
    }
}
