<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Laravel\Fortify\Fortify;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = new User();
        $user->name = 'Julian';
        $user->email = 'julianrodriguez19961@gmail.com';
        $user->password = Hash::make('Samein321');
        $user->current_team_id = 1;
        $user->people_data_id = '1';
        $user->save();

        // CreateNewUser::create($input);
    }
}
