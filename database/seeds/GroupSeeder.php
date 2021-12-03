<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
              'group' => 'Group1',
              'contact_name' => 'Group1_Name',
              'address' => 'Group1_Address',
              'post_code' => 'Group1_Post_Code',
              'city' => 'Group1_City',
              'email' => 'Group1@email.com'
        ]);

        DB::table('groups')->insert(
            [
                'group' => 'group2',
                'contact_name' => 'Jane Doe',
                'address' => 'Another Street 456',
                'post_code' => '13000',
                'city' => 'Los Angeles',
                'email' => 'jane@example.com',
            ]
        );
    }
}
