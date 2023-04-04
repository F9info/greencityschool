<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;
use DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (PaymentMethod::find(1) == null && PaymentMethod::where('slug', 'stripe')->first() == null) {
            DB::table('payment_methods')->insert([
                'id' => 1,
                'payment_method_name' => 'Stripe',
                'display_name' => 'Card Payment',
                'slug' => 'stripe',
                'sandbox_key' => 'pk_test_51MFWfSIF27vR0q9LT74HhFmhs8a2FRC4cFv9f0U0nPSzWVwNPfhxLvhcFwWD2cOvUogTThH3G9V01LlbidxMT8wq006uFizQVc',
                'sandbox_secret' => 'sk_test_51MFWfSIF27vR0q9LV6i4BQrPcLLEjDXVTXmQbpPeHC55UyagFaiEWhizHlLMuVSVlFoAyoUzxQB98UkDGNpD6S1T009bouNfc9',
                'position' => 1
            ]);
        }
        if (PaymentMethod::find(2) == null && PaymentMethod::where('slug', 'cheque')->first() == null) {
            DB::table('payment_methods')->insert([
                'id' => 2,
                'payment_method_name' => 'Cheque',
                'display_name' => 'Cheque Payment',
                'slug' => 'cheque',
                'position' => 2
            ]);
        }
        if (PaymentMethod::find(3) == null && PaymentMethod::where('slug', 'paypal')->first() == null) {
            DB::table('payment_methods')->insert([
                'id' => 3,
                'payment_method_name' => 'Paypal',
                'display_name' => 'Paypal',
                'slug' => 'paypal',
                'sandbox_key' => 'AX1_KnOyqDJL11xaOcgxYvAbFnbKqzyXvHyZyPf7o-DPdpS9XXqtLbdf64vjWkJEbVGznLxwFsPr0S2H',
                'sandbox_secret' => 'EG1iZGgerEsd0bTT-IWENHYIz3gAVxcksC5AxWYOXVljxaaEQt53OCrDpLmNshI3_zawxYv4RY7iX6Sw',
                'position' => 3
            ]);
        }
        if (PaymentMethod::find(4) == null && PaymentMethod::where('slug', 'quickpay')->first() == null) {
            DB::table('payment_methods')->insert([
                'id' => 4,
                'payment_method_name' => 'Quickpay',
                'display_name' => 'Quickpay',
                'slug' => 'quickpay',
                'position' => 4
            ]);
        }
    }
}
