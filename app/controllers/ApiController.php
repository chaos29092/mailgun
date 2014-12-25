<?php
use Mailgun\Mailgun;

//工具函数，stdclass转数组
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    } if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

class ApiController extends BaseController {

    public function test()
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $result = $mgClient->get("$domain/campaigns/test/events", array('limit' => 100));

        $data['result'] = object_array($result);
        return View::make('test',$data);
    }
}