<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eredmeny;

class EredmenySeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/eredmeny.txt');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $counter = 0;

        foreach ($lines as $line) {
            if ($counter++ > 100) break; // csak az első 100 sort
            $data = explode("\t", $line);

            Eredmeny::create([
                'datum' => $data[0],
                'helyezes' => $data[2] ?: null,
                'hiba' => $data[3] ?: null,
                'csapat' => $data[4] ?: null,
                'auto' => $data[5] ?: null,
                'motor' => $data[6] ?: null,
            ]);
        }
    }
}
