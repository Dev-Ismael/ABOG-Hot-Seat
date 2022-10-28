<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Admin::factory(1)->create();


        \App\Models\Setting::factory(1)->create([
            'address' => 'address',
            'location' => 'location',
            'footer_content' => 'footer_content',
            'email' => 'email@gmail.com',
            'phone' => 'phone',
            'phone_formatted' => 'phone_formatted',
            'instagram' => 'instagram',
            'facebook'  => 'facebook',
            'twitter'   => 'twitter',
            'youtube'   => 'youtube',
        ]);


        \App\Models\Messege::factory(1)->create([
            'name' => 'name',
            'phone' => 'phone',
            'email' => 'email',
            'subject' => 'subject',
            'body' => 'messege',
        ]);


        \App\Models\Plan::factory(1)->create([
            'title'       => 'title',
            'slug'        => 'slug',
            'old_price'   => 235,
            'price'       => 125,
            'recommended' => '0',
            'content'     => 'content',
        ]);


    }
}
