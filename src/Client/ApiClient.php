<?php

namespace MyApp\Client;

use GuzzleHttp\Client;
use Exception;

class ApiClient extends Client
{
    private string $url;

    public function __construct(string $url)
    {
        parent::__construct();
        $this->url = $url;
    }

    public function getAll():array
    {
        $res_json = $this->request('GET', $this->url.'/api/files')->getBody();
        $res_array = json_decode($res_json, true);
        $fileDTO_array = array();
        $index = 0;
        foreach ($res_array as $value) {
            $fileDTO_array[$index] = new FileDTO($value["title"], $value["size"], $value["path"]);
            $index++;
        }
        return $fileDTO_array;
    }

    public function upload(string $filepath)
    {
        try {
            $res = $this->request('POST', $this->url . '/api/files', [
                    'multipart' =>
                        [
                            [
                                'name' => 'file',
                                'contents' => fopen($filepath, 'r')
                            ]
                        ]
                ]
            );
            return $res->getStatusCode() == 201;
        }
        catch (Exception $ex) {
            return new ApiClientException($ex->getMessage(), $ex->getCode());
        }
    }

    public function download(string $filename)
    {
        try {
            return $this->request('GET', $this->url.'/api/files/'.$filename)->getBody();
        }
        catch (Exception $ex) {
            return new ApiClientException($ex->getMessage(), $ex->getCode());
        }
    }

    public function deleteFile(string $filename)
    {
        try {
            $res = $this->request('DELETE', $this->url.'/api/files/'.$filename);
            return $res->getStatusCode() == 200;
        }
        catch (Exception $ex) {
            return new ApiClientException($ex->getMessage(), $ex->getCode());
        }
    }
}