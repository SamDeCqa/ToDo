<?php

namespace App\Jobs;

use App\Models\Event;
use App\Models\User;
use App\Notifications\EventNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendNotificationJob implements ShouldQueue
{
    use Queueable;
    public $events;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $now = Carbon::now();
            $sixHoursLater = $now->copy()->addHours(6);

            // Events starting within 6 hours that are not notified
            $events = Event::where('is_notified', 0)
                        ->whereBetween('from', [$now, $sixHoursLater])
                        ->get();

            foreach ($events as $event) {
                $user = User::find($event->user_id);
                $eventData = [
                    'id'   => $event->id,
                    'name' => $event->name,
                    'from' => $event->from,
                ];
                if ($user) {
                    Notification::send($user, new EventNotification($eventData));
                    $event->is_notified = 1;
                    $event->save();
                }
            }

        } catch (\Exception $e) {
            Log::error('Failed to send notification: '.$e->getMessage());
        }
    }
}
