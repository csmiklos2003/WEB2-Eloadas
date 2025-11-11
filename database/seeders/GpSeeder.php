<?php

namespace Database\Seeders; // ← FONTOS: legyen namespace!

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gp;

class GpSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 1️⃣ Kapcsolat beállítása UTF-8-ra (ha MySQL)
        DB::connection('f1')->statement("SET NAMES 'utf8mb4'");
        DB::connection('f1')->statement("SET CHARACTER SET utf8mb4");
        DB::connection('f1')->statement("SET collation_connection = 'utf8mb4_unicode_ci'");

        // 📂 2️⃣ A fájl elérési útja
        $path = storage_path('app/gp.txt');

        
        // 📖 3️⃣ Soronként beolvassuk a fájlt
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // 🧠 4️⃣ Biztosítjuk, hogy minden sor UTF-8 legyen
           $line = mb_convert_encoding($line, 'UTF-8', 'auto');




            $data = explode("\t", $line);
            if (count($data) < 3) {
                continue; // kihagyjuk a hibás sorokat
            }

            try {
                Gp::create([
                    'datum' => trim($data[0]) ?: null,
                    'nev'   => trim($data[1]),
                    'orszag'=> trim($data[2]),
                ]);
            } catch (\Exception $e) {
                //$this->command->warn("⚠️ Hiba a sor feldolgozásakor: {$line}");
                $this->command->warn($e->getMessage());
            }
        }

        
    }
}
