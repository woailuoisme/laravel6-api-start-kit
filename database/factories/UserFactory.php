<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//$factory->define(User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        'remember_token' => Str::random(10),
//    ];
//});
$factory->define(User::class, function (Faker $faker) {
    $createdTime = $faker->dateTimeBetween('-3 months');
    $updatedTime =(clone $createdTime)->modify('+5 days');
    $emailVerifiedTime =(clone $createdTime)->modify('+5 minutes');
    return [
        'name' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $emailVerifiedTime,
        'avatar' =>$faker->imageUrl(100,100),
        'password' => '123456', // password
        'remember_token' => Str::random(10),
        'created_at' => $createdTime,
        'updated_at' => $updatedTime,
    ];
});

$factory->state(User::class, 'user-one', function (Faker $faker) {
    return [
        'name' => 'ailuoga',
        'email' => 'jhbwyl@126.com',
        'password' => '123456',
    ];
});

//$factory->afterCreating(App\User::class, function ($user, $faker) {
//    $user->profile()->save(factory(\App\Models\Profile::class)->make());
//    $user->cart()->save(factory(\App\Models\Cart::class)->make());
//});
