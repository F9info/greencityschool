<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApplicationSetting;
use DB;

class ApplicationSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (ApplicationSetting::where('slug', 'google-recaptcha-site-key')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Google recaptcha Settings',
                'slug' => 'google-recaptcha-settings',
                'input_type' => 'heading',
                'type' => 'general-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'google-recaptcha-site-key')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Google reCAPTCHA Site Key',
                'slug' => 'google-recaptcha-site-key',
                'input_type' => 'textbox',
                'value' => '6LfYMCkaAAAAAJgNMXHqliCChLpZf3jnbDLBaCgk',
                'type' => 'general-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'google-recaptcha-secret-key')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Google reCAPTCHA Secret Key',
                'slug' => 'google-recaptcha-secret-key',
                'input_type' => 'textbox',
                'value' => '6LfYMCkaAAAAAFGxo_MFOZjXd182Cfv6AiqyDlEI',
                'type' => 'general-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'payment-settings')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Payment Settings',
                'slug' => 'payment-settings',
                'input_type' => 'heading',
                'type' => 'general-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'payment-mode')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Payment Mode',
                'slug' => 'payment-mode',
                'input_type' => 'select',
                'value' => 'Sandbox',
                'type' => 'general-settings',
                'options' => 'Sandbox,Live'
            ]);
        }
        if (ApplicationSetting::where('slug', 'currency')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Currency',
                'slug' => 'currency',
                'input_type' => 'select',
                'value' => 'inr',
                'type' => 'general-settings',
                'options' => 'inr,usd'
            ]);
        }
        if (ApplicationSetting::where('slug', 'admin-mail')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Admin Mail',
                'slug' => 'admin-mail',
                'input_type' => 'textbox',
                'value' => 'qa@f9tech.com',
                'type' => 'application-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'quickpay-note')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Quick Pay Note',
                'slug' => 'quickpay-note',
                'input_type' => 'textarea',
                'value' => '<p>Please send payments to: <a href="mailto:treasurer@f9tech.com" target="_blank">treasurer@f9tech.com</a> via QuickPay / Zelle and Include <span id="quickrefno">&nbsp;</span> as the reference number in the payment memo.</p>',
                'type' => 'application-settings'
            ]);
        }
        if (ApplicationSetting::where('slug', 'payment-gateway-fees')->first() == null) {
            DB::table('application_settings')->insert([
                'field_name' => 'Payment Gateway Fees',
                'slug' => 'payment-gateway-fees',
                'input_type' => 'textbox',
                'value' => '3',
                'type' => 'application-settings'
            ]);
        }
    }
}
