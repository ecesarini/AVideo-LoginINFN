<?php
/*!
* Hybridauth
* https://hybridauth.github.io | https://github.com/hybridauth/hybridauth
*  (c) 2017 Hybridauth authors | https://hybridauth.github.io/license.html
*/

namespace Hybridauth\Provider;

use Hybridauth\Adapter\OAuth2;
use Hybridauth\Exception\UnexpectedApiResponseException;
use Hybridauth\HttpClient;
use Hybridauth\Data;
use Hybriduth\Data\Collection;
use Hybridauth\User;



class InfnAAI extends OAuth2
{
    protected $scope = 'openid profile email';
    protected $apiBaseUrl = 'https://idp.app.infn.it';
    protected $accessTokenUrl = 'https://idp.app.infn.it/auth/realms/aai/protocol/openid-connect/token';
    protected $authorizeUrl = 'https://idp.app.infn.it/auth/realms/aai/protocol/openid-connect/auth';
    //protected $callback = 'Hybridauth\HttpClient\Util::getCurrentUrl()';

    protected function initialize()
    {
        parent::initialize();
        
        if ($this->isRefreshTokenAvailable()) {
            $this->tokenRefreshParameters += [
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type'    => 'refresh_token',
            ];
        }

    }
    
    /*public function maintainToken()
    {
        if (!$this->isConnected() ) {
            $this->disconnect();
            //return HttpClient\Util::redirect('https://mediawall-dev.infn.it');
            //return HttpClient\Util::redirect('https://servizinazionali.infn.it');
            //echo "<h1 style='background-color: red; width: 100vw; height: 100vh'>CIAO A TUTTI</h1>";
            return;
        }
    
    }*/

    public function getUserProfile()
    {
    $response = $this->apiRequest('auth/realms/aai/protocol/openid-connect/userinfo');
    
    $colletion = new Data\Collection($response);

    $userProfile = new User\Profile();

    $userProfile->identifier = $colletion->get('sub');
    $userProfile->displayName = $colletion->get('name');
    $userProfile->email = $colletion->get('email');
    $userProfile->firstName = $colletion->get('given_name');
    $userProfile->lastName = $colletion->get('family_name');

    return $userProfile;
    }

}
