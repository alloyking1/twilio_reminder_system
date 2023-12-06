<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Models\Reminder;

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

        $account_sid = env('TWILIO_SID');
        $account_token = env("TWILIO_TOKEN");
        $sending_number = env("TWILIO_NUMBER");
        $twilio_client = new Client($account_sid, $account_token);

        // while (true) {

        $now = Carbon::now('Africa/Lagos')->toDateTimeString();
        $reminders = Reminder::where('status', '0')->get();

        foreach ($reminders as $reminder) {
            if ($reminder->timezoneoffset <= $now) {
                $twilio_client->messages->create(
                    $reminder->mobile_no,
                    array("from" => $sending_number, "body" => "Reminder for: $reminder->message")
                );

                //whatsapp message here
                Reminder::updated(['status' => '1']);
                dump('Notification sent to' . $reminder->mobile_no);
            }
        }
        // \sleep(1);
        // }
    }
}
