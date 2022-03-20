<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HtmlFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('html_fields')->insert([
            [
                'id' =>1,
                'html_fields' => 'Text Field',
                'created_at' =>now()
            ],
            [
                'id' =>2,
                'html_fields' => 'Text Field (Numbers Only)',
                'created_at' =>now()
            ],
            [
                'id' =>3,
                'html_fields' => 'Select Box',
                'created_at' =>now()
            ]
            
        ]);
    }
}
