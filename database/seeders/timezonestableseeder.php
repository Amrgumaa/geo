<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\timezone;
use Illuminate\Support\Facades\DB;
use Database\Seeders\File;

class timezonestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../database/data/timezones.json'), true);
        $now  = date('Y-m-d H:i:s');
        DB::table('timezones')->delete();

        foreach ($data as $tzs) {
            foreach ($tzs as $offset => $timezones) {
                foreach ($timezones as $timezone) {
                   timezone::create(array(
                        'label' => $timezone['label'],
                        'value' => $timezone['value'],
                        'offset' => $offset,
                        'created_at' => $now,
                        'updated_at' => $now
                    ));
                }
            }
        }

    }
}
