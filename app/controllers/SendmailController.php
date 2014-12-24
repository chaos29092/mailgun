<?php

//队列任务 函数设置
class SendEmail {

    public function send()
    {
        $data = array(
            'sender' => 'Raymond',
        );
        Mailgun::send(array('html' => 'emails.html.test', 'text' => 'emails.text.test'), $data, function($message)
        {
            $ad = Input::get('manyemail');
            $ad = explode("\r",$ad);
            $message->to($ad, 'chaos')->subject('Welcome!');
        });
    }
}

class SendmailController extends BaseController {

    public function sendMany()
    {
        Queue::push('SendEmail@send');
    }

}