<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        settings()->set([
            'app_name' => 'Edusec',

            'contact_email'   => 'support@edusec.biz',
            'contact_email_2' => 'info@edusec.biz',
            'contact_phone'   => '+237 690 300 451',
            'contact_phone_2' => '+237 123-456-789',
            'notify_email'     => 'contact@edusec.biz.com',

            'work_hours'        => 'Mon -Fri | 8AM - 4PM',
            'address'           => 'Cameroon',

            'facebook_url'  => 'https://web.facebook.com/Edusec237',
            'twitter_url'   => 'https://twitter.com/Edusec1',
            'instagram_url' => 'https://www.instagram.com/edusec_community/',
            'linkedin_url'  => 'https://www.linkedin.com',
        ]);
    }
}
