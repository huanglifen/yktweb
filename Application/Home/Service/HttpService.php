<?php namespace Home\Service;

class HttpService {
    protected $_userAgent = 'Mozilla/4.0 (compatible;MSIE 6.0;Window NT 5.1';
    protected $_url;
    protected $_followLocation;
    protected $_timeout;
    protected $_maxRedirects;
    protected $_post;
    protected $_postFields;
    protected $_status;
    protected $_result;

    public $authentication = 0;
    public $auth_name = '';
    public $auth_pass = '';

    public function useAuth($use) {
        $this->authentication = 0;
        if($use == true) {
            $this->authentication = 1;
        }
    }

    public function setName($name) {
        $this->auth_name = $name;
    }

    public function setPass($pass) {
        $this->auth_pass = $pass;
    }
    public function __construct($url, $followLocation = true, $timeOut = 30) {
        $this->_url = $url;
        $this->_timeout = $timeOut;
        $this->_followLocation = $followLocation;
    }

    public function setPost($postFields) {
        $this->_post = true;
        $this->_postFields = http_build_query($postFields);
    }

    public function setUserAgent($userAgent) {
        $this->_userAgent = $userAgent;
    }

    public function createCurl() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $this->_followLocation);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($this->authentication == 1) {
            curl_setopt($curl, CURLOPT_USERPWD, $this->auth_name.":".$this->auth_pass);
        }
        if($this->_post) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->_postFields);
        }
        curl_setopt($curl, CURLOPT_USERAGENT, $this->_userAgent);
        $this->_result = curl_exec($curl);
        $this->_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    }

    public function getHttpStatus() {
        return $this->_status;
    }

    public function getResult() {
        return $this->_result;
    }
}
