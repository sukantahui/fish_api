<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\PersonType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {

     
        //person_types table data
        PersonType::create(['person_type_name' => 'Owner']);
        PersonType::create(['person_type_name' => 'Manager']);
        PersonType::create(['person_type_name' => 'Manager Workshop']);
        PersonType::create(['person_type_name' => 'Manager Sales']);
        PersonType::create(['person_type_name' => 'Manager Accounts']);
        PersonType::create(['person_type_name' => 'Office Staff']);
        PersonType::create(['person_type_name' => 'Agent']);
        PersonType::create(['person_type_name' => 'Worker']);
        PersonType::create(['person_type_name' => 'Developer']);
        PersonType::create(['person_type_name' => 'Customer']);
        PersonType::create(['person_type_name' => 'Karigarh']);

        // user
        User::create(['person_name'=>'Vivekananda Ghsoh','mobile1'=>'9836444999','mobile2'=>'','email'=>'bangle312@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>1,'customer_category_id'=>1]);
        User::create(['person_name'=>'Abishek Basak','mobile1'=>'9836444451','mobile2'=>'','email'=>'bangle396@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7]);
        User::create(['person_name'=>'Pushpendu Pal','mobile1'=>'9836444568','mobile2'=>'','email'=>'bangle363@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7,'customer_category_id'=>3]);
        User::create(['person_name'=>'Pushpendu Roy','mobile1'=>'9836444426','mobile2'=>'','email'=>'bangle376@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>8,'customer_category_id'=>4]);
        User::create(['person_name'=>'Pushpendu Ghosh','mobile1'=>'9836444785','mobile2'=>'','email'=>'bangle371@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>10,'customer_category_id'=>2]);
        User::create(['person_name'=>'Abishek Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle314@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7,'customer_category_id'=>3]);
        User::create(['person_name'=>'Joy Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle322@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>3]);
        User::create(['person_name'=>'Erik Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle333@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>3]);
        User::create(['person_name'=>'Tuhin Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle344@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>3]);



        
        //use following command for products in separate seeding products are not seeding here
       // php artisan db:seed --class=ProductSeeder

        factory(User::class,500)->create();
    }
}
