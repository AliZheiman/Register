<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use App\Events\RegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\EmailNotification;
use App\Models\CodeVerify;
use Carbon\Carbon;

class EmailVerifyListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterEvent $event): void
    {
        $code = Str::random(6);
        CodeVerify::create([
            'email'         =>          $event->user->email,
            'code'          =>          $code,
        ]);
        $test = CodeVerify::where("code", "=", $code)->first();
        $test->updated_at = Carbon::now()->addMinutes(3);
        $test->save();

        $event->user->notify(new EmailNotification($code, $event->user->email));
    }
}
