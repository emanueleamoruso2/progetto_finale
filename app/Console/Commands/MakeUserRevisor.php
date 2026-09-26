<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    protected $signature = 'user:make-revisor {email}';

    protected $description = 'Rende revisore un utente registrato';

    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }

        if ($user->is_revisor) {
            $this->info('Questo utente è già revisore');
            return;
        }

        $user->is_revisor = true;

        $user->save();

        $this->info('Utente reso revisore correttamente');
    }
}