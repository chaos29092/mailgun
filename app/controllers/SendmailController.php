<?php

class SendmailController extends BaseController {

    public function sendOne()
    {

        $data = array(
            'customer' => 'John Smith',
            'email' => Input::get('email')
        );
        Mailgun::send(array('html' => 'emails.html.test', 'text' => 'emails.text.test'), $data, function($message)
        {
            $ad = Input::get('email');
            $message->to($ad, 'chaos')->subject('Welcome!');
        });
    }

    public function sendMany()
    {
        $data = array(
            'customer' => 'John Smith',
            'email' => Input::get('email')
        );
        Mailgun::send(array('html' => 'emails.html.test', 'text' => 'emails.text.test'), $data, function($message)
        {
            $ad = Input::get('manyemail');
            $ad = explode("\r",$ad);
            $message->to($ad, 'chaos')->subject('Welcome!');
        });
    }

}