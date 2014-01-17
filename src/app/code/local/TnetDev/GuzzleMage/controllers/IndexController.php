<?php

use Guzzle\Http\Client;

class TnetDev_GuzzleMage_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo "Hello world.";
    }

    public function githubAction()
    {
        $username = Mage::getStoreConfig('credentials/github/username');
        $password = Mage::getStoreConfig('credentials/github/password');

        if ($username === '' || $password === '') {
            printf('<pre>%s', 'Add your username/password to the migrationscript');
            die();
        }

        // Create a client and provide a base URL
        $client = new Client('https://api.github.com');
        $client->setUserAgent('TnetDev_GuzzleMage on '.php_uname('n'));

        $request = $client->get('/user');
        $request->setAuth($username, $password);

        $response = $request->send();

        printf('<pre>request->getUrl %s</pre>', $request->getUrl());
        printf('<pre>request->getHeaders %s</pre>', print_r($request->getHeaders(), true));
        printf('<pre>request->getBody %s</pre>', print_r($response->getBody(), true));
        printf('<pre>request->xml %s</pre>', print_r($response->xml(), true));
    }

}
