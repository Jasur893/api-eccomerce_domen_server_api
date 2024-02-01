<?php

namespace Database\Seeders;

use App\Enums\GeneralSwitch;
use App\Enums\PhpMode;
use App\Enums\PhpVersion;
use App\Models\HostingRates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostingRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $price = [
            86400 => 44.44,
            2592000 => 45.8,
            31536000 => 65.8,
        ];

        $parametrs = [
            'backup' => GeneralSwitch::OFF,
            'limit_quota' => 8,
            "limit_db" => 3,
            'limit_dbsize' => 2000,
            'limit_db_users' => 3,
            'limit_ftp_users' => 3,
            'limit_webdomains' => 2,
            'limit_domains' => 6,
            'limit_emaildomains' => 4,
            'limit_emails' => 4,
            'limit_cpu' => 10,
            'limit_memory' => 5120,
            'limit_process' => 9,
            'limit_email_quota' => 13,
            'limit_mailrate' => 20,
            'limit_scheduler' => 10,
            'limit_nginxlimitconn' => 8,
            'limit_mysql_maxuserconn' => 10,
            'limit_ssl' => GeneralSwitch::OFF,
            'limit_cl_cpu' => 6,
            'limit_cl_nproc' => 6,
            'limit_cl_pmem' => 6,
            'limit_cl_io' => 6,
            'limit_cl_maxentryprocs' => 5,
            'limit_cl_cagefs' => GeneralSwitch::ON,
            'limit_cl_php' => PhpVersion::V8_1,
            'limit_php_mode_lsapi' => GeneralSwitch::ON,
            'limit_shell' => GeneralSwitch::OFF,
            'limit_charset' => 'UTF-8',
            'limit_php_mode' => PhpMode::PHP_MODE_CGI,
            'limit_php_lsapi_version' => PhpVersion::V8_2,
        ];

        HostingRates::create([
            'name' => 'Hosting name1',
            'server_id' => 1,
            'offering' => GeneralSwitch::OFF,
            'active' => GeneralSwitch::ON,
            'free' => GeneralSwitch::OFF,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia',
            'price' => json_encode($price),
            'parametrs' => json_encode($parametrs)
        ]);

        HostingRates::create([
            'name' => 'Hosting name2',
            'server_id' => 1,
            'offering' => GeneralSwitch::ON,
            'active' => GeneralSwitch::ON,
            'free' => GeneralSwitch::OFF,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia',
            'price' => json_encode($price),
            'parametrs' => json_encode($parametrs)
        ]);

        HostingRates::create([
            'name' => 'Hosting name3',
            'server_id' => 1,
            'offering' => GeneralSwitch::ON,
            'active' => GeneralSwitch::ON,
            'free' => GeneralSwitch::OFF,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia',
            'price' => json_encode($price),
            'parametrs' => json_encode($parametrs)
        ]);
    }
}
