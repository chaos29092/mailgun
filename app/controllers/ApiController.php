<?php
use Mailgun\Mailgun;

class ApiController extends BaseController {

    public function test()
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $result = $mgClient->get("$domain/campaigns/test/events", array('limit' => 50));

        $httpResponseCode = $result->http_response_code;
        $httpResponseBody = $result->http_response_body;

        $logItems = $result->http_response_body;
        $data['test'] = null ;
        foreach($logItems as $logItem){
            $data['test'] = $data['test'] . $logItem->recipient . "\n";
        }

        return View::make('test',$data);
    }
}