<?php

namespace Database\Factories;

use App\Models\dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<dosen>
 */
class dosenFactory extends Factory
{   
    protected $model = dosen::class;

    protected static $sequenceNumber = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {       
        $latestNidn = \App\Models\dosen::max('nidn');
        $nextNumber = $latestNidn ? ((int)$latestNidn) + 1 : 1;
        $paddedId = str_pad(self::$sequenceNumber, 10, '0', STR_PAD_LEFT);
        
        return [
            'nidn' => $paddedId,
            'nama' => $this->faker->name(),
        ];
    }
}
