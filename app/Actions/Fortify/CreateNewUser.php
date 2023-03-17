<?php

namespace App\Actions\Fortify;

use App\Models\PeopleData;
use App\Models\Team;
use App\Models\User;
use App\Actions\Fortify\Rule;
use App\Http\Requests\peopleDataRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Symfony\Component\Console\Input\Input;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {


        Validator::make($input, [
            'document' => ['required', 'unique:people_data'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        $peopleData = PeopleData::create($input);
        $peopledata_id = $peopleData['id'];

        return DB::transaction(function () use ($input, $peopledata_id) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'people_data_id' => $peopledata_id,
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
        
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
