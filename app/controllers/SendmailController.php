<?php

//队列任务 函数设置
class SendEmail {

    public function send()
    {
        $data = array(
            'sender' => 'Дима Song',
        );
        Mailgun::send(array('html' => 'emails.html.ru', 'text' => 'emails.text.ru'), $data, function($message)
        {
            $address = explode("\r",Input::get('manyemail'));
            $subject = Input::get('subject');
            $campaign = explode(",",Input::get('campaign'));
            $tag = explode(",",Input::get('tag'));
            $message->to($address, '%recipient_name%')
                    ->subject($subject)
                    ->campaign($campaign)
                    ->tag($tag);
        });
    }
}

class SendmailController extends BaseController {

    public function sendMany()
    {
        Queue::push('SendEmail@send');
    }

}