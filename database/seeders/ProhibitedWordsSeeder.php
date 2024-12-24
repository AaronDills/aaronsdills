<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProhibitedWords;
class ProhibitedWordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProhibitedWords::create(['word' => 'fuck']);
        ProhibitedWords::create(['word' => 'shit']);
        ProhibitedWords::create(['word' => 'bitch']);
        ProhibitedWords::create(['word' => 'asshole']);
        ProhibitedWords::create(['word' => 'dick']);
        ProhibitedWords::create(['word' => 'cunt']);
        ProhibitedWords::create(['word' => 'pussy']);
        ProhibitedWords::create(['word' => 'faggot']);
        ProhibitedWords::create(['word' => 'nigger']);
        ProhibitedWords::create(['word' => 'nigga']);
        ProhibitedWords::create(['word' => 'negro']);
        ProhibitedWords::create(['word' => 'kike']);
        ProhibitedWords::create(['word' => 'jew']);
        ProhibitedWords::create(['word' => 'nazi']);
        ProhibitedWords::create(['word' => 'damn']);
        ProhibitedWords::create(['word' => 'fck']);
        ProhibitedWords::create(['word' => 'fcking']);
        ProhibitedWords::create(['word' => 'whore']);
        ProhibitedWords::create(['word' => 'slut']);
        ProhibitedWords::create(['word' => 'sucks']);
        ProhibitedWords::create(['word' => 'suck']);
        ProhibitedWords::create(['word' => 'trash']);
        ProhibitedWords::create(['word' => 'bad']);
        ProhibitedWords::create(['word' => 'ass']);
    }
}
