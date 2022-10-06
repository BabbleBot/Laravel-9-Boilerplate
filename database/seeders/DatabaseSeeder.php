<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

use \App\Models\User;
use \App\Models\Book;
use \App\Models\Page;

use Helper;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->create();
        echo "Generated " . User::count() . " users.\n";


        User::inRandomOrder()
            ->limit(rand(1, User::count()))
            ->get()
            ->each(function($user){
                $books = Book::factory()->count(rand(1, 5))->make();
                $user->books()->saveMany($books);
            });
        echo "Generated " . Book::count() . " books belonging to " . User::has('books')->count() . " users, leaving " . User::doesnthave('books')->count() . " user(s) with no book.\n";

        Book::all()->each(function($book){
            $startingPages = Page::factory()->count(1)->starting()->make();
            $startingPages = $book->pages()->saveMany($startingPages);

            $startingPages->each(function($page) use ($book) {
                $this->generatePageTree($book, $page);
            });
        });
        echo "Generated " . Page::count() . " pages.\n";
    }

    //FIXME: inaccurate counter
    private function generatePageTree(Book $book, Page $page, &$pageNb=0){
        $echoSuffix = $pageNb ? "\r" : "\n";

        $nbAddPage = rand(1,4);

        $pageNb+=$nbAddPage;
        $sizeFactor = 0.5;
        if ($pageNb < 50) $state = 'ongoing';
        elseif ($pageNb > 150) $state = Helper::getRandomWeightedElement(['defeat' => 80, 'victory' => 20]);
        else $state = Helper::getRandomWeightedElement(['ongoing' => 80, 'victory' => 10, 'defeat' => 10]);

        $newPageCollection =
            Page::factory()
                ->count($nbAddPage)
                ->for($book)
                ->create([
                    'state' => $state,
                ]);

        $newPageCollection->each(function($newPage) use ($book, $page, &$pageNb) {
            $newPage->origins()->attach($page);

            if($newPage->ongoing) $this->generatePageTree($book, $newPage, $pageNb);
        });

        echo "$pageNb pages created for book $book->id" . $echoSuffix;
    }
}
