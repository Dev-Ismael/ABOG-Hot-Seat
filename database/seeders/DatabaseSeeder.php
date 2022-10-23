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
            'linkedin' => 'linkedin',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'youtube' => 'youtube',
        ]);


        \App\Models\Messege::factory(1)->create([
            'name' => 'name',
            'email' => 'email',
            'body' => 'messege',
        ]);


        \App\Models\Subscriber::factory()->create([
            'email'      => 'a.ismael@bluskyint.com',
        ]);


        \App\Models\Newsletter::factory(1)->create([
            'subject'      => 'subject',
            'content'      => 'content',
        ]);


        \App\Models\Plan::factory(1)->create([
            'title'       => 'title',
            'slug'        => 'slug',
            'old_price'   => 235,
            'price'       => 125,
            'recommended' => '0',
            'content'     => 'content',
        ]);


        \App\Models\SeoManagement::factory(1)->create([
            'home' => '[home]',
            'about' => '[about]',
            'contact' => '[contact]',
        ]);



    }
}
