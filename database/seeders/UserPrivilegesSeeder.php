<?php

// database/seeders/UserPrivilegesSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Modules\Book\App\Models\Book;
use Illuminate\Database\Seeder;

class UserPrivilegesSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1); // Or create a sample user
        $book = Book::find(1); // Or create a sample book

        // Assign a privilege to the user for the book
        $user->privileges()->create([
            'privilege_name' => 'view',
            'model_id' => $book->id,
            'model_type' => Book::class,
        ]);
    }
}
