<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{   

    protected $model = Mahasiswa::class;

    protected static $sequenceNumber = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $paddedId = str_pad(self::$sequenceNumber, 10, '2', STR_PAD_LEFT);
        self::$sequenceNumber++;

        return [
            'npm' => $paddedId,
            'nama' => $this->faker->name(),
        ];
    }
}
