<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class LogSubmissionSavedListener
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
    public function handle(object $event)
    {
        Log::info('Submission saved successfully.', [
            'name' => $event->name,
            'email' => $event->email,
        ]);
    }
}
