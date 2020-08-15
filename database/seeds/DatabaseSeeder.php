<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\CustomerCategory;
use App\Model\PersonType;
use App\Model\ProductCategory;
use App\Model\Product;

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
        PersonType::create(['person_type_name' => 'Owner']);                //1
        PersonType::create(['person_type_name' => 'Manager']);              //2
        PersonType::create(['person_type_name' => 'Manager Workshop']);     //3
        PersonType::create(['person_type_name' => 'Manager Sales']);        //4
        PersonType::create(['person_type_name' => 'Manager Accounts']);     //5
        PersonType::create(['person_type_name' => 'Office Staff']);         //6
        PersonType::create(['person_type_name' => 'Agent']);                //7
        PersonType::create(['person_type_name' => 'Worker']);               //8
        PersonType::create(['person_type_name' => 'Developer']);            //9
        PersonType::create(['person_type_name' => 'Customer']);             //10
        PersonType::create(['person_type_name' => 'Vendor']);               //11
        PersonType::create(['person_type_name' => 'Customer Cum Vendor']);  //12

        //customer_categories table data
        CustomerCategory::create(['customer_category_name'=>'Not Applicable']);
        CustomerCategory::create(['customer_category_name'=>'Good']);
        CustomerCategory::create(['customer_category_name'=>'Better']);
        CustomerCategory::create(['customer_category_name'=>'Best']);
        CustomerCategory::create(['customer_category_name'=>'Excellent']);

        // user
        User::create(['person_name'=>'Vivekananda Ghsoh','mobile1'=>'9836444999','mobile2'=>'','email'=>'bangle312@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>1,'customer_category_id'=>1]);
        User::create(['person_name'=>'Abishek Basak','mobile1'=>'9836444451','mobile2'=>'','email'=>'bangle396@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7,'customer_category_id'=>1]);
        User::create(['person_name'=>'Pushpendu Pal','mobile1'=>'9836444568','mobile2'=>'','email'=>'bangle363@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7,'customer_category_id'=>1]);
        User::create(['person_name'=>'Pushpendu Roy','mobile1'=>'9836444426','mobile2'=>'','email'=>'bangle376@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>8,'customer_category_id'=>1]);
        User::create(['person_name'=>'Pushpendu Ghosh','mobile1'=>'9836444785','mobile2'=>'','email'=>'bangle371@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>10,'customer_category_id'=>1]);
        User::create(['person_name'=>'Abishek Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle314@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7,'customer_category_id'=>1]);
        User::create(['person_name'=>'Joy Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'bangle322@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1]);
        User::create(['person_name'=>'Erik Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'erik@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1]);
        User::create(['person_name'=>'Tuhin Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'tuhin@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1]);


        //vendor
        User::create(['person_name'=>'Ritaja Ghosh','mobile1'=>'9836444972','mobile2'=>'','email'=>'ritaja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>3000]);
        User::create(['person_name'=>'Supriya Sandhukhan','mobile1'=>'9836444972','mobile2'=>'','email'=>'supriya@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>5000]);
        User::create(['person_name'=>'Suman Mondal','mobile1'=>'9836444972','mobile2'=>'','email'=>'suman@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>4000]);

        //customer cum vendor
        User::create(['person_name'=>'Suparna Saha','mobile1'=>'9836444972','mobile2'=>'','email'=>'suparna@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>12,'customer_category_id'=>3]);


        //creating Customers(Fake)
        factory(User::class,100)->create();

        //product_categories table data
        ProductCategory::create(['category_name'=>'Ruhi']);
        ProductCategory::create(['category_name'=>'Katla']);
        ProductCategory::create(['category_name'=>'Hilsa']);
        ProductCategory::create(['category_name'=>'Pabda']);
        ProductCategory::create(['category_name'=>'Tangra']);
        ProductCategory::create(['category_name'=>'pron']);
        ProductCategory::create(['category_name'=>'Lobster']);
        ProductCategory::create(['category_name'=>'Pomfret']);
        ProductCategory::create(['category_name'=>'Bata']);
        ProductCategory::create(['category_name'=>'Parse']);
        ProductCategory::create(['category_name'=>'Vetki']);
        ProductCategory::create(['category_name'=>'Chital']);


        //Product Ruhi
        Product::insert([
            ['product_code'=>'R1','product_name'=>'Ruhi Less than 1 KG','product_category_id'=>1],
            ['product_code'=>'R2','product_name'=>'Ruhi Between 1 and half','product_category_id'=>1],
            ['product_code'=>'R3','product_name'=>'Ruhi Greater than 1.5 and less than 2KG','product_category_id'=>1],
            ['product_code'=>'R4','product_name'=>'Ruhi Greater than 2KG','product_category_id'=>1]
        ]);

        //Product Katla
        Product::insert([
            ['product_code'=>'K1','product_name'=>'Katla Less than 1 KG','product_category_id'=>2],
            ['product_code'=>'K2','product_name'=>'Katla Between 1 and half','product_category_id'=>2],
            ['product_code'=>'K3','product_name'=>'Katla Greater than 1.5 and less than 2KG','product_category_id'=>2],
            ['product_code'=>'K4','product_name'=>'Katla Greater than 2KG','product_category_id'=>2]
        ]);

        //Product Hilsa
        Product::insert([
            ['product_code'=>'H1','product_name'=>'Hilsa Less than 300 Gram','product_category_id'=>3],
            ['product_code'=>'H2','product_name'=>'Hilsa Between 300gm and 500gm','product_category_id'=>3],
            ['product_code'=>'H3','product_name'=>'Hilsa Between 500gm and 700gm','product_category_id'=>3],
            ['product_code'=>'H4','product_name'=>'Hilsa Greater than 1KG','product_category_id'=>3]
        ]);

        //Product Pabda
        Product::insert([
            ['product_code'=>'P1','product_name'=>'Pabda Less than 1 KG','product_category_id'=>4],
            ['product_code'=>'P2','product_name'=>'Pabda Between 1 and half','product_category_id'=>4],
            ['product_code'=>'P3','product_name'=>'Pabda Greater than 1.5 and less than 2KG','product_category_id'=>4],
            ['product_code'=>'P4','product_name'=>'Pabda Greater than 2KG','product_category_id'=>4]
        ]);

        //use following command for products in separate seeding products are not seeding here
       // php artisan db:seed --class=ProductSeeder

    }
}
