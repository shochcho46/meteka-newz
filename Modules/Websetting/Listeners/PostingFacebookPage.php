<?php

namespace Modules\Websetting\Listeners;

use Modules\Websetting\Events\FacebookPagePost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Helper\FacebookUpdateKey;

class PostingFacebookPage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param FacebookPagePost $event
     * @return void
     */
    public function handle(FacebookPagePost $event)
    {

        $fbPagePost = new FacebookUpdateKey;
       $fbPagePost =  $fbPagePost->postOnPageFacebook($event->url);
    }
}
