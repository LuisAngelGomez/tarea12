<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      \App\Models\Movie::create([
    'name' => 'Inception',
    'classification' => 'Sci-Fi',
    'release_date' => '2010-07-16',
    'review' => 'A thief who steals corporate secrets through the use of dream-sharing technology.',
    'season' => null
]);
    }
}
