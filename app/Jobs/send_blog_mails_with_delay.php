<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\Cuspajz_Hr_Novi_Sadrzaj_Na_Blogu;

use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class send_blog_mails_with_delay implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $user;
    protected $blog_title;

    /**
     * Create a new job instance.
     *
     * @return void
     */


    public function __construct($user , $blog_title)
    {
        $this->user = $user;
        $this->blog_title = $blog_title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new Cuspajz_Hr_Novi_Sadrzaj_Na_Blogu($this->blog_title));
    }
}
