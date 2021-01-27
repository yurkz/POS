<?php

namespace Database\Seeders;


use App\Models;
use App\Models\Models\Lead;
use App\Models\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'hello',
            'email' => 'testing@yahoo.com',
            'password' => bcrypt('12345678'),
        ]);


        Lead::create([
            'name' => 'Hello',
            'email' => 'World@yahoo.com',
            'phone' => '1234123',
            'age' => Carbon::parse('01/01/2010')->age,
            'interested_package' => 'Package',
            'dob' => Carbon::parse('01/01/2010'),
            'branch_id' => 1,
            'added_by' => 1
        ]);
        Lead::create([
            'name' => 'Hello1',
            'email' => 'World@yahoo.com',
            'phone' => '1234123',
            'age' => Carbon::parse('01/01/2010')->age,
            'interested_package' => 'Package',
            'dob' => Carbon::parse('01/01/2010'),
            'branch_id' => 1,
            'added_by' => 1
        ]);
        Lead::create([
            'name' => 'Hello2',
            'email' => 'World@yahoo.com',
            'phone' => '1234123',
            'age' => Carbon::parse('01/01/2010')->age,
            'interested_package' => 'Package',
            'dob' => Carbon::parse('01/01/2010'),
            'branch_id' => 1,
            'added_by' => 1
        ]);


        Reminder::create([
            'lead_id' => 1,
            'user_id' => 1,
            'reminder' => "Hello Reminder",
            'note' => "hello Note",
            'reminder_date' => Carbon::parse('01/01/2010'),
            'status' => "Status"
        ]);
    }
}
