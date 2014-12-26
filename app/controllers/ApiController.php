<?php
use Mailgun\Mailgun;

class ApiController extends BaseController {

    public function campaigns()
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $skip = Input::get('skip');
        $result = $mgClient->get("$domain/campaigns", array('skip' => $skip,'limit' => 100));

        $httpResponseCode = $result->http_response_code;
        $httpResponseBody = $result->http_response_body;

        $campaignsItems = $result->http_response_body->items;
        $campaignsNumber = $result->http_response_body->total_count;
        $data['campaigns'] = $campaignsItems;
        $data['total'] = $campaignsNumber;
        $data['skip'] = $skip;

        return View::make('campaignslist',$data);
    }

    public function campaignCreat()
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $name = Input::get('name');
        $id = Input::get('id');
        $result = $mgClient->post("$domain/campaigns", array('name' => $name,'id' => $id));

        return Redirect::to('campaigns')->with('message','营销任务创建成功。');
    }

    public function campaignDelete($id)
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $result = $mgClient->delete("$domain/campaigns/$id");

        return Redirect::to('campaigns')->with('message','营销任务删除成功。');
    }

    public function campaignUpdate()
    {
        $mgClient = new Mailgun('key-42b2ca9deaeaa59566bc33a1c5462210');
        $domain = 'email.hanvymbh.com';

        $id = Input::get('id');
        $name = Input::get('name');
        $result = $mgClient->put("$domain/campaigns/$id",array('name'=> $name , 'id' => $id));

        return Redirect::to('campaigns')->with('message','营销任务修改成功。');
    }
}