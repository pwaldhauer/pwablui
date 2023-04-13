<?php

namespace PwaBlui\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $username = $this->ask('Username');
        $password = $this->ask('Password');

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password),
            ...$this->additionalUserParameters(),
        ]);

        $this->info('Created user '.$user->username);
    }

    protected function additionalUserParameters(): array
    {
        return [];
    }
}
