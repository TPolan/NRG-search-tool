<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user for the aplication using name email and password';


    public function handle(): void
    {
        $name = $this->ask('What is the new users name?');
        $email = $this->ask('What is the new users email');
        $password = Hash::make($this->ask('What is the new users password'));

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $this->info('New user succesfuly created');
    }
}
