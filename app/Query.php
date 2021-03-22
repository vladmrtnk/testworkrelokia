<?php


namespace App;
use GuzzleHttp\Client;

class Query
{

    public static function GetTickets($id)
    {
        if($id){

            $client = new Client(['base_uri' => 'https://mrtnk.zendesk.com/api/v2/']);
            $res = $client->request('GET', 'tickets/'. $id .'.json', [
                'auth' => ['mrtnk.vlad@gmail.com', 'vlad000mar',],
                'http_errors' => false
            ]);
            if($res->getStatusCode() == 200){
                $body = $res->getBody();
                $arr = json_decode($body, true);

                return $arr['ticket'];
            }
            elseif($res->getStatusCode() == 404){
                return 404;
            }

        }


    }

    public static function GetUsers($id)
    {
        if($id){
            $client = new Client(['base_uri' => 'https://mrtnk.zendesk.com/api/v2/']);
            $res = $client->request('GET', 'users/'. $id .'.json', [
                'auth' => ['mrtnk.vlad@gmail.com', 'vlad000mar']
            ]);
            $body = $res->getBody();
            $arr = json_decode($body, true);
            return $arr['user'];
        }
    }
    public static function GetGroups($id)
    {
        if($id) {
            $client = new Client(['base_uri' => 'https://mrtnk.zendesk.com/api/v2/']);
            $res = $client->request('GET', 'groups/' . $id . '.json', [
                'auth' => ['mrtnk.vlad@gmail.com', 'vlad000mar']
            ]);
            $body = $res->getBody();
            $arr = json_decode($body, true);
            return $arr['group']['name'];
        }
    }

    public static function GetOrganizations($id)
    {
        if($id) {
            $client = new Client(['base_uri' => 'https://mrtnk.zendesk.com/api/v2/']);
            $res = $client->request('GET', 'organizations/' . $id . '.json', [
                'auth' => ['mrtnk.vlad@gmail.com', 'vlad000mar']
            ]);
            $body = $res->getBody();
            $arr = json_decode($body, true);
            return $arr['organization']['name'];
        }

    }
}