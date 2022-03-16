<?php

namespace Database\Factories;

use App\Models\DeviceBackup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceBackup>
 */
class DeviceBackupFactory extends Factory {

    protected $model = DeviceBackup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $dateTime = $this->faker->dateTimeThisDecade;
        return [
            'user_id' => 1,
            'device_id' => 1,
            'name' => $this->faker->sentence(random_int(1, 6)),
            'tar' => $this->faker->url . $this->faker->word() . 'tar',
            'preferences' => '{"data": ["trusted.plist"]}',
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
