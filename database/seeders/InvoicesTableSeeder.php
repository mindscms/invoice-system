<?php

namespace Database\Seeders;

use App\Invoice;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create('ar_SA');

        for ($i = 1; $i <= 15; $i++) {

            $items = [
                [
                    'product_name' => 'طاولة كمبيوتر كبيرة',
                    'unit' => 'piece',
                    'quantity' => '2',
                    'unit_price' => '560',
                    'row_sub_total' => '1120',
                ],
                [
                    'product_name' => 'طاولة كمبيوتر صغيرة',
                    'unit' => 'piece',
                    'quantity' => '1',
                    'unit_price' => '220',
                    'row_sub_total' => '220',
                ],
                [
                    'product_name' => 'كمبيوتر محمول',
                    'unit' => 'piece',
                    'quantity' => '1',
                    'unit_price' => '4500',
                    'row_sub_total' => '4500',
                ]
            ];

            $data['customer_name']      = $faker->name('male');
            $data['customer_email']     = $faker->email;
            $data['customer_mobile']    = $this->generateNumbers(rand(10, 14));
            $data['company_name']       = $faker->name;
            $data['invoice_number']     = $this->generateNumbers(8);;
            $data['invoice_date']       = Carbon::now()->subDays(rand(1, 20));
            $data['sub_total']          = '5840';
            $data['discount_type']      = 'fixed';
            $data['discount_value']     = '0';
            $data['vat_value']          = '292';
            $data['shipping']           = '100';
            $data['total_due']          = '6232';


            $invoice = Invoice::create($data);

            $invoice->details()->createMany($items);


        }


    }

    public function generateNumbers($strength = 14)
    {
        $permitted_chars = '0123456789';

        $input_length = strlen($permitted_chars);

        $random_string = '';

        for ($i = 1; $i < $strength; $i++) {
            $random_characters = $permitted_chars[mt_rand(0, $input_length -1)];
            $random_string .= $random_characters;
        }
        return $random_string;
    }

}
