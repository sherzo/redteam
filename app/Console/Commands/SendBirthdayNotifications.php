<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notification;
use App\Event;

class SendBirthdayNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía notificaiones de los cumpleañeros del día';

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
     * @return mixed
     */
    public function handle()
    {
        $now = now();
        $month = $now->format('m');
        $day = $now->format('d');

        $users = User::join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->whereMonth('birthdate', $month)
            ->whereDay('birthdate', $day)
            ->get();

        foreach ($users as $key => $user) {
            $data = "Hoy es el cumpleaños de <strong class='nameUserNotifique'>". $user->full_name ."</strong>";

            $notification = Notification::create([
                'data' => $data,
                'type' => 4
            ]);

            $event = Event::create([
                'title' => $user->full_name . ' esta de cumpleaños',
                'day' => $now->format('Y-m-d'),
            ]);
        }

        $this->info('Las notificaciones a los usuario fueron enviadas correctamente');
    }
}
