<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending reminder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        print_r('Sending reminders actively');
        while (true) {
            //twilio commands here
            // $account_sid = getenv('TWILIO_ID');
            // $account_token = getenv("TWILIO_TOKEN");
            // $sending_number = getenv("TWILIO_NUMBER");
            // $twilio_client = new Client($account_sid, $account_token);
            // $now = Carbon::now('Africa/Lagos')->toDateTimeString();
            // $reminders = Reminder::where([['timezoneoffset', '=', $now], ['status', 'pending']])->get();
            // foreach ($reminders as $reminder) {
            //     $twilio_client->messages->create(
            //         $reminder->mobile_no,
            //         array("from" => $sending_number, "body" => "Reminder for: $reminder->message")
            //     );
            //     $reminder->status = 'sent';
            //     $reminder->save();
            // }
            \sleep(1);
        }
    }
}
