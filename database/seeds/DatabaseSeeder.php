<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\CustomerCategory;
use App\Model\PersonType;
use App\Model\ProductCategory;
use App\Model\Product;
Use App\Model\Unit;
use App\Model\purchaseMaster;
use App\Model\PurchaseDetail;
use App\Model\LedgerGroup;
use App\Model\Voucher;
use App\Model\Ledger;

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
        User::create(['person_name'=>'Ritaja Das','mobile1'=>'9836449972','mobile2'=>'','email'=>'rita4ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>3000]);
        User::create(['person_name'=>'Supriya Sandhukhan','mobile1'=>'9839444972','mobile2'=>'','email'=>'supriy4a@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>5000]);
        User::create(['person_name'=>'Suman Mondal','mobile1'=>'9836644972','mobile2'=>'','email'=>'suma74n@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>4000]);
        User::create(['person_name'=>'Rathin Ghosh','mobile1'=>'9838445979','mobile2'=>'','email'=>'rita6ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>13000]);
        User::create(['person_name'=>'Supriya Dhara','mobile1'=>'9146434972','mobile2'=>'','email'=>'su4priyaDhara@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>15000]);
        User::create(['person_name'=>'Bimal Mondal','mobile1'=>'9536474972','mobile2'=>'563535334534','email'=>'Z67XCV@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>41000]);
        User::create(['person_name'=>'Ritaja Sen','mobile1'=>'9831444972','mobile2'=>'','email'=>'rita34ja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>307770]);
        User::create(['person_name'=>'Supriya Halder','mobile1'=>'9836441972','mobile2'=>'','email'=>'sup4riya@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>5070]);
        User::create(['person_name'=>'Suman Baishya','mobile1'=>'9836144972','mobile2'=>'','email'=>'suma56n@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>4060]);
        User::create(['person_name'=>'Rathin Talukdar','mobile1'=>'9838461979','mobile2'=>'','email'=>'ritaja@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>13090]);
        User::create(['person_name'=>'Supriya Pandey','mobile1'=>'9716434972','mobile2'=>'','email'=>'supriyaDhara@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>15070]);
        User::create(['person_name'=>'Bimal Agarwal','mobile1'=>'9516474972','mobile2'=>'863535334534','email'=>'ZX6CV@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>11,'customer_category_id'=>1,'balance'=>1000]);

        //customer cum vendor
        User::create(['person_name'=>'Suparna Saha Das','mobile1'=>'98316444972','mobile2'=>'','email'=>'suparna@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>12,'customer_category_id'=>3]);


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


        // purchase Master
        purchaseMaster::create(['purchase_date'=>'2020-05-22','invoice_number'=>'PKJH-00001-2021','vendor_id'=>11,'employee_id'=>1]);
        PurchaseDetail::create(['purchase_master_id'=>1,'product_id'=>1,'unit_id'=>3,'quantity'=>5,'price'=>230]);
        PurchaseDetail::create(['purchase_master_id'=>1,'product_id'=>3,'unit_id'=>3,'quantity'=>10,'price'=>210]);
        PurchaseDetail::create(['purchase_master_id'=>1,'product_id'=>5,'unit_id'=>3,'quantity'=>11,'price'=>220]);
        PurchaseDetail::create(['purchase_master_id'=>1,'product_id'=>4,'unit_id'=>3,'quantity'=>15,'price'=>120]);
        PurchaseDetail::create(['purchase_master_id'=>1,'product_id'=>6,'unit_id'=>3,'quantity'=>5,'price'=>420]);


        // purchase Master
        purchaseMaster::create(['purchase_date'=>'2020-05-24','invoice_number'=>'PKJH-00002-2021','vendor_id'=>15,'employee_id'=>1]);
        PurchaseDetail::create(['purchase_master_id'=>2,'product_id'=>11,'unit_id'=>3,'quantity'=>3,'price'=>130]);
        PurchaseDetail::create(['purchase_master_id'=>2,'product_id'=>13,'unit_id'=>3,'quantity'=>8,'price'=>510]);
        PurchaseDetail::create(['purchase_master_id'=>2,'product_id'=>15,'unit_id'=>3,'quantity'=>9,'price'=>325]);
        PurchaseDetail::create(['purchase_master_id'=>2,'product_id'=>14,'unit_id'=>3,'quantity'=>15,'price'=>720]);
        PurchaseDetail::create(['purchase_master_id'=>2,'product_id'=>16,'unit_id'=>3,'quantity'=>25,'price'=>620]);

        // purchase Master
        purchaseMaster::create(['purchase_date'=>'2020-05-25','invoice_number'=>'PKJH-00003-2021','vendor_id'=>11,'employee_id'=>1]);
        PurchaseDetail::create(['purchase_master_id'=>3,'product_id'=>1,'unit_id'=>3,'quantity'=>6,'price'=>130]);
        PurchaseDetail::create(['purchase_master_id'=>3,'product_id'=>4,'unit_id'=>3,'quantity'=>15,'price'=>110]);
        PurchaseDetail::create(['purchase_master_id'=>3,'product_id'=>15,'unit_id'=>3,'quantity'=>8,'price'=>225]);
        PurchaseDetail::create(['purchase_master_id'=>3,'product_id'=>10,'unit_id'=>3,'quantity'=>9,'price'=>520]);
        PurchaseDetail::create(['purchase_master_id'=>3,'product_id'=>12,'unit_id'=>3,'quantity'=>17,'price'=>420]);

        //use following command for products in separate seeding products are not seeding here
       // php artisan db:seed --class=ProductSeeder

       //Ledger Groups
        LedgerGroup::insert([
            ['group_name'=>'Current Assets'],           //1
            ['group_name'=>'Indirect Expenses'],        //2
            ['group_name'=>'Current Liabilities'],      //3
            ['group_name'=>'Fixed Assets'],             //4
            ['group_name'=>'Direct Incomes'],           //5
            ['group_name'=>'Indirect Incomes'],         //6
            ['group_name'=>'Bank Account'],             //7
            ['group_name'=>'Loans & Liabilities'],      //8
            ['group_name'=>'Bank OD'],                  //9
            ['group_name'=>'Branch & Division'],        //10
            ['group_name'=>'Capital Account'],          //11
            ['group_name'=>'Direct Expenses'],          //12
            ['group_name'=>'Cash in Hand'],             //13
            ['group_name'=>'Stock in Hand'],            //14
            ['group_name'=>'Sundry Creditors'],         //15
            ['group_name'=>'Sundry Debtors'],           //16
            ['group_name'=>'Suspense Account'],         //17
            ['group_name'=>'Indirect Income'],          //18
            ['group_name'=>'Sales Account'],            //19
            ['group_name'=>'Duties & Taxes'],           //20
            ['group_name'=>'Investment'],               //21
            ['group_name'=>'Purchase Account'],         //22
            ['group_name'=>'Investments']               //23
        ]);

        //Ledger - Sundry Creditors
        Ledger::create(['ledger_name'=>'Ritaja Das Kolkata','billing_name'=>'M/S Ritaja Das','ledger_group_id'=>'15','email'=>'rita4ja@gmail.com','mobile1'=>'9836449972','mobile2'=>'2342342','opening_balance'=>3459,'balance_type'=>'-1']);
        Ledger::create(['ledger_name'=>'Sonali Samanta','billing_name'=>'M/S Sonali Samanta','ledger_group_id'=>'15','email'=>'dibesh@gmail.com','mobile1'=>'435333453423','mobile2'=>'25423234244','opening_balance'=>7568,'balance_type'=>'-1']);
        Ledger::create(['ledger_name'=>'Dinesh Debnath','billing_name'=>'M/S Dinesh Debnath','ledger_group_id'=>'15','email'=>'sumit@gmail.com','mobile1'=>'34554234','mobile2'=>'24232334244','opening_balance'=>46833,'balance_type'=>'-1']);
        Ledger::create(['ledger_name'=>'Sumit Sen Delhi','billing_name'=>'M/S Sumit Sen','ledger_group_id'=>'15','email'=>'sumitsen@gmail.com','mobile1'=>'345345345','mobile2'=>'34345345','opening_balance'=>7693,'balance_type'=>'-1']);
        Ledger::create(['ledger_name'=>'Rajesh Saha','billing_name'=>'M/S Rajesh Saha','ledger_group_id'=>'15','email'=>'rajeshSaha@gmail.com','mobile1'=>'3254534532','mobile2'=>'34345345','opening_balance'=>7693,'balance_type'=>'-1']);
        Ledger::create(['ledger_name'=>'Sunit Saha','billing_name'=>'M/S Sunit Mollah','ledger_group_id'=>'15','email'=>'sunitSaha@gmail.com','mobile1'=>'34543563','mobile2'=>'34566634','opening_balance'=>6798,'balance_type'=>'-1']);

        //Ledger - Sundry Debtors
        Ledger::create(['ledger_name'=>'Surendra Sarkaar','billing_name'=>'M/S Surendra Sarkaar','ledger_group_id'=>'16','email'=>'etyet@gmail.com','mobile1'=>'9836449972','mobile2'=>'2342342','opening_balance'=>3459,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Sumit Barman','billing_name'=>'M/S Sumit Barman','ledger_group_id'=>'16','email'=>'etyery@gmail.com','mobile1'=>'435333453423','mobile2'=>'25423234244','opening_balance'=>7568,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Sudeshna Dey','billing_name'=>'M/S Sudeshna Dey','ledger_group_id'=>'16','email'=>'ertyery@gmail.com','mobile1'=>'34554234','mobile2'=>'24232334244','opening_balance'=>46833,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Kaustav Paul Delhi','billing_name'=>'M/S Kaustav Paul','ledger_group_id'=>'16','email'=>'sumertyitsen@gmail.com','mobile1'=>'345345345','mobile2'=>'34345345','opening_balance'=>7693,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Kumkum Begum','billing_name'=>'M/S Kumkum Begum','ledger_group_id'=>'16','email'=>'ery@gmail.com','mobile1'=>'3254534532','mobile2'=>'34345345','opening_balance'=>7693,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Sunita Kumari','billing_name'=>'M/S Sunita Kumari','ledger_group_id'=>'16','email'=>'suniertyetSaha@gmail.com','mobile1'=>'34543563','mobile2'=>'34566634','opening_balance'=>6798,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Rathin Saha','billing_name'=>'M/S Rathin Saha','ledger_group_id'=>'16','email'=>'etyet@gmail.com','mobile1'=>'9836449972','mobile2'=>'2342342','opening_balance'=>3479,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Ritam Karmakar','billing_name'=>'M/S Ritam Karmakar','ledger_group_id'=>'16','email'=>'etyery@gmail.com','mobile1'=>'435333453423','mobile2'=>'25423234244','opening_balance'=>5568,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Himani Haribangshi','billing_name'=>'M/S Himani Haribangshi','ledger_group_id'=>'16','email'=>'ertyery@gmail.com','mobile1'=>'34554234','mobile2'=>'24232334244','opening_balance'=>49833,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Kunal Paul Delhi','billing_name'=>'M/S Kunal Paul','ledger_group_id'=>'16','email'=>'sumertyitsen@gmail.com','mobile1'=>'345345345','mobile2'=>'34345345','opening_balance'=>3693,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Ritesh Deshmukh','billing_name'=>'M/S Ritesh Deshmukh','ledger_group_id'=>'16','email'=>'ery@gmail.com','mobile1'=>'3254534532','mobile2'=>'34345345','opening_balance'=>9693,'balance_type'=>'1']);
        Ledger::create(['ledger_name'=>'Dunpite Kumari','billing_name'=>'M/S Dunpite Kumari','ledger_group_id'=>'16','email'=>'suniertyetSaha@gmail.com','mobile1'=>'34543563','mobile2'=>'34566634','opening_balance'=>6598,'balance_type'=>'1']);

        //Cash
        Ledger::create(['ledger_name'=>'Cash in Hand','billing_name'=>'Cash in Hand','ledger_group_id'=>'13','email'=>'','mobile1'=>'','mobile2'=>'','opening_balance'=>7654,'balance_type'=>'1']);
        //Bank
        Ledger::create(['ledger_name'=>'Bank','billing_name'=>'State Bank of India','branch'=>'Anandapuri','account_number'=>'547002010004586','ifsc'=>'SBIN000123','ledger_group_id'=>'7','email'=>'anandapuri@sbi.com','mobile1'=>'234234234','mobile2'=>'23424454','opening_balance'=>5654,'balance_type'=>'1']);


        Voucher::insert([
            ['voucher_name'=>'Sales Voucher'],
            ['voucher_name'=>'Purchase Voucher'],
            ['voucher_name'=>'Payment Voucher'],
            ['voucher_name'=>'Receipt Voucher'],
            ['voucher_name'=>'Contra Voucher'],
            ['voucher_name'=>'Journal Voucher'],
            ['voucher_name'=>'Credit Note Voucher'],
            ['voucher_name'=>'Debit Note Voucher']
        ]);
    }
}
