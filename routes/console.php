<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('massCategoriesInsert', function () {

    $categories = [
        [
            'name' => 'Видеокарты',
            'description' => 'sadfasfsdf',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'Процессоры',
            'description' => '23в23в32в32в3232',
            'created_at' => date('Y-m-d H:i:s'),
        ],
    ];

    Category::insert($categories);
});

Artisan::command('updateCategory', function () {
    Category::where('id', 2)->update([
        'name' => 'Процессоры'
    ]);
});

Artisan::command('deleteCategory', function () {
    // $category = Category::find(1);
    // $category->delete();
    Category::whereNotNull('id')->delete();
});

Artisan::command('createCategory', function () {

    $category = new Category([
        'name' => 'Видеокарты',
        'description' => 'Ждем rtx 3050'
    ]);

    $category->save();
});

Artisan::command('inspire', function () {

    $user = User::find(2);
    $addresses = $user->addresses->filter(function ($address) {
        return $address->main;
    })->pluck('address');

    $addresses = $user->addresses()->where('main', 1)->get;
    dd($addresses);

    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
