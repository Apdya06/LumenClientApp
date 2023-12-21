<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostsController extends Controller{

    public function getRequestJson(Request $request){
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);

        return view('posts/getRequestJson', ['results' => $response]);
    }

    public function postRequestJson(Request $request){
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/json', 'Content-Type: application/json'];
        $data  = [
            "title" => "Test post dengan Client",
            "content" => "Content test",
            "status" => "published",
            "user_id" => "1",
        ];

        $data_json = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);

        return view('posts/postRequestJson', ['result' => $response]);
    }

    public function getRequestXml(Request $request) {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/xml'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $results = curl_exec($ch);
        $xml = simplexml_load_string($results, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        curl_close($ch);

        return view('posts/getRequestXml', ['results' => $array]);
    }

    public function postRequestXml(Request $request) {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/xml', 'Content-Type: application/xml'];

        $data = '
        <post>
            <title>Test post xml client Client</title>
            <content>Content test</content>
            <status>published</status>
            <user_id>1</user_id>
        </post>
        ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        $xml = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        curl_close($ch);

        // Lakukan pengolahan atau penyesuaian jika diperlukan untuk respons XML yang diterima

        return view('posts/postRequestXml', ['result' => $array]);
    }

}
