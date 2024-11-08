<?php

namespace Modules\Websetting\Events;

use Illuminate\Queue\SerializesModels;

class FacebookPagePost
{
    use SerializesModels;
    public $url;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
