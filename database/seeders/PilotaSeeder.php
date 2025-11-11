<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pilota;

class PilotaSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/pilota.txt');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $data = explode("\t", $line);
            if (count($data) < 5) continue;

            Pilota::create([
                'nev' => $data[1],
                'nem' => $data[2],
                'szuletett' => $data[3] ?: null,
                'nemzetiseg' => $data[4],
            ]);
        }
    }
}

