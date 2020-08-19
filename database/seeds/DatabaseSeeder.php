<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\CustomerCategory;
use App\Model\PersonType;
use App\Model\ProductCategory;
use App\Model\Product;
Use App\Model\Unit;

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
        User::create(['person_name'=>'Ritaja Ghosh','mobile1'=>'9836449972','mobile2'=>'','email'=>'rita4ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>3000]);
        User::create(['person_name'=>'Supriya Sandhukhan','mobile1'=>'9839444972','mobile2'=>'','email'=>'supriy4a@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>5000]);
        User::create(['person_name'=>'Suman Mondal','mobile1'=>'9836644972','mobile2'=>'','email'=>'suma74n@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>4000]);
        User::create(['person_name'=>'Rathin Ghosh','mobile1'=>'9838445979','mobile2'=>'','email'=>'rita6ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>13000]);
        User::create(['person_name'=>'Supriya Dhara','mobile1'=>'9146434972','mobile2'=>'','email'=>'su4priyaDhara@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>15000]);
        User::create(['person_name'=>'Bimal Mondal','mobile1'=>'9536474972','mobile2'=>'563535334534','email'=>'Z67XCV@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>41000]);
        User::create(['person_name'=>'Ritaja Ghosh','mobile1'=>'9831444972','mobile2'=>'','email'=>'rita34ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>307770]);
        User::create(['person_name'=>'Supriya Halder','mobile1'=>'9836441972','mobile2'=>'','email'=>'sup4riya@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>5070]);
        User::create(['person_name'=>'Suman Baishya','mobile1'=>'9836144972','mobile2'=>'','email'=>'suma56n@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>4060]);
        User::create(['person_name'=>'Rathin Talukdar','mobile1'=>'9838461979','mobile2'=>'','email'=>'ritaja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>13090]);
        User::create(['person_name'=>'Supriya Pandey','mobile1'=>'9716434972','mobile2'=>'','email'=>'supriyaDhara@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>15070]);
        User::create(['person_name'=>'Bimal Agarwal','mobile1'=>'9516474972','mobile2'=>'863535334534','email'=>'ZX6CV@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>1000]);

        //customer cum vendor
        User::create(['person_name'=>'Suparna Saha','mobile1'=>'9836444972','mobile2'=>'','email'=>'suparna@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>12,'customer_category_id'=>3]);


        //creating Customers(Fake)
        factory(User::class,100)->create();



        //Unit
        //1
        Unit::create(['unit_name'=>'Primary','formal_name'=>'Primary','parent_id'=>0,'parent_conversion'=>0,'position'=>1,'active'=>0]);
        //2
        Unit::create(['unit_name'=>'gm','formal_name'=>'Gram','parent_id'=>1,'parent_conversion'=>0,'position'=>1,'active'=>0]);
        //3
        Unit::create(['unit_name'=>'kg','formal_name'=>'Kilo Gram','parent_id'=>2,'parent_conversion'=>1000,'position'=>2,'active'=>1]);
        //4
        Unit::create(['unit_name'=>'qntl','formal_name'=>'Quintal','parent_id'=>3,'parent_conversion'=>100,'position'=>3,'active'=>0]);
        //5
        Unit::create(['unit_name'=>'ton','formal_name'=>'Tonne','parent_id'=>4,'parent_conversion'=>10,'position'=>4,'active'=>0]);
        //6
        Unit::create(['unit_name'=>'pcs','formal_name'=>'Piece','parent_id'=>1,'parent_conversion'=>0,'position'=>1,'active'=>1]);

        //product_categories table data
        ProductCategory::create(['category_name'=>'Ruhi রুই']);
        ProductCategory::create(['category_name'=>'Katla কাতলা']);
        ProductCategory::create(['category_name'=>'Hilsa ইলিশ']);
        ProductCategory::create(['category_name'=>'Pabda পাবদা']);
        ProductCategory::create(['category_name'=>'Tangra টেংরা']);
        ProductCategory::create(['category_name'=>'pron চিংড়ি']);
        ProductCategory::create(['category_name'=>'Lobster গলদা চিংড়ি']);
        ProductCategory::create(['category_name'=>'Pomfret পমফ্রেট']);
        ProductCategory::create(['category_name'=>'Bata বাটা']);
        ProductCategory::create(['category_name'=>'Parse পারসে']);
        ProductCategory::create(['category_name'=>'Vetki ভেটকি']);
        ProductCategory::create(['category_name'=>'Chital চিতল']);


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
