<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\User;
use App\Notifications\EventNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class sendEventNotificationCommand extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifying Users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try{

            $events = Event::select('name','user_id','from')
                        ->where('is_notified', 0)
                        ->where('from', '<=', Carbon::now()->subHours(6))
                        ->get();

            foreach($events as $event){
                $user = User::find($event->user_id);
                $eventData = [
                    'id'   => $event->id,
                    'name' => $event->name,
                    'from' => $event->from,
                ];
                Notification::send($user,new EventNotification($eventData));
                $event->is_notified = 1;
                $event->save();
            }

        }catch(\Exception $e){
            Log::info('COMMAND HAIKUFANIKIWA KWA SABABU: '.$e);
        }
    }
}
