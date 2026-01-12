<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Transfer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Translation\Extractor\Visitor\TransMethodVisitor;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
            UserSeeder::class,
        ]);   

       Wallet::factory(10)->create();
       Category::factory(30)->create();
        Transaction::factory(100)->create();
        Transfer::factory(50)->create();

    }
}
