<?php

namespace App\Jobs;

use App\Events\SubmissionSavedEvent;
use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SavingSubmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $submission = Submission::create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'message' => $this->data['message'],
        ]);

        event(new SubmissionSavedEvent($submission->name, $submission->email));
    }
}
