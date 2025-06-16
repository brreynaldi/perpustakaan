<?php
// database/seeders/BookSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'year' => 2005, 'stock' => 5],
            ['title' => 'Bumi', 'author' => 'Tere Liye', 'year' => 2014, 'stock' => 3],
            ['title' => 'Negeri 5 Menara', 'author' => 'Ahmad Fuadi', 'year' => 2009, 'stock' => 4],
        ]);
    }
}
