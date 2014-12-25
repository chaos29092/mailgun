<?php

//队列任务 函数 主要逻辑在这里体现
class Webhook {

    public function delivered()
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

    public function delivered()
    {
        Queue::push('Webhook@delivered');
    }
}