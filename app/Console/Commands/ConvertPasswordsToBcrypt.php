<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ConvertPasswordsToBcrypt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-passwords-to-bcrypt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert existing passwords to Bcrypt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Simple check to see if the password needs rehashing
            if (!Hash::needsRehash($user->password)) {
                $this->info("Password for user {$user->id} is already using Bcrypt.");
                continue;
            }

            // Rehash the password with Bcrypt
            $oldPassword = $user->password;

            $user->password = Hash::make($oldPassword);
            $user->save();

            $this->info("Password for user {$user->id} has been converted to Bcrypt.");
        }

        $this->info('All passwords have been converted to Bcrypt.');
        return 0;
    }
}
