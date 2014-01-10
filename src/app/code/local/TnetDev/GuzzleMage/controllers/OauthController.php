<?php

use Guzzle\Http\Client;
use Guzzle\Plugin\Oauth\OauthPlugin;

use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;


class TnetDev_GuzzleMage_OauthController extends Mage_Core_Controller_Front_Action
{
//    protected $_consumerKey = 'yazlpSXDLcOjhPqOYQRg';
//    protected $_consumerSecret = 'KIIEOrgnxQPiZEMMSzMgdHZrpWEEZmoa';
//    protected $_requestTokenUrl = 'http://api.discogs.com/oauth/request_token';
//    protected $_authorizeUrl = 'http://www.discogs.com/oauth/authorize';
//    protected $_accessTokenUrl = 'http://api.discogs.com/oauth/access_token';



    public function indexAction()
    {
        echo "Hello world.";
    }

    public function mockAction()
    {

        $client = new Client('http://www.test.com/');

        $mock = new MockPlugin();
        $mock->addResponse(new Response(200))
            ->addResponse(new Response(404));

        // Add the mock plugin to the client object
        $client->addSubscriber($mock);

        // The following request will receive a 200 response from the plugin
        $client->get('http://www.example.com/')->send();

        // The following request will receive a 404 response from the plugin
        $client->get('http://www.test.com/')->send();

    }

    public function discogsAction()
    {
        $client = new Client('http://api.discogs.com/');
        $oauth = new OauthPlugin(array(
            'consumer_key'    => 'yazlpSXDLcOjhPqOYQRg',
            'consumer_secret' => 'KIIEOrgnxQPiZEMMSzMgdHZrpWEEZmoa',
            'token'           => 'my_token',
            'token_secret'    => 'my_token_secret'
        ));
        $client->addSubscriber($oauth);

        $response = $client->get('statuses/public_timeline.json')->send();
    }


    public function twitterAction()
    {
        die('is example code');
        $client = new Client('http://api.twitter.com/1');
        $oauth = new OauthPlugin(array(
            'consumer_key'    => 'my_key',
            'consumer_secret' => 'my_secret',
            'token'           => 'my_token',
            'token_secret'    => 'my_token_secret'
        ));
        $client->addSubscriber($oauth);

        $response = $client->get('statuses/public_timeline.json')->send();
    }

    public function callbackAction()
    {


    }

    
}