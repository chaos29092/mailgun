<?php

//队列任务 函数设置
class Delivered {

    public function receive()
    {
        $data = array(
            'event' => Input::get('event'),
            'recipient' => Input::get('recipient'),
            'domain' => Input::get('domain'),
        );
        Mailgun::send(array('html' => 'emails.html.test', 'text' => 'emails.text.test'), $data, function($message)
        {

            $message->to('178399731@qq.com', 'chaos')
                    ->subject('webhook test');

        });
    }
}

class WebhookController extends BaseController {

    public function receive()
    {
        Queue::push('Delivered@receive');
    }
}