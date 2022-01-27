<?php

require_once $global['systemRootPath'] . 'plugin/Plugin.abstract.php';

class LoginINFN extends PluginAbstract {

    public function getTags() {
        return array(
            PluginTags::$FREE,
            PluginTags::$LOGIN,
        );
    }
    public function getDescription() {
        global $global;
        $obj = $this->getLogin();
        $name = $obj->type;
        $str = "Login with {$name} OAuth Integration";
        $str .= "<br><a href='{$obj->linkToDevelopersPage}'>Get {$name} ID and Key</a>"
        . "<br>Valid OAuth redirect URIs: <strong>{$global['webSiteRootURL']}objects/login.json.php?type=$name</strong>"
        . "<br>For mobile a Valid OAuth redirect URIs: <strong>{$global['webSiteRootURL']}plugin/MobileManager/oauth2.php?type=$name</strong>";
        return $str;
    }

    public function getName() {
        return "LoginINFN";
    }

    public function getUUID() {
        return "15ed127a-0880-42bb-938f-e3888ff52fd9";
    }

    public function getPluginVersion() {
        return "1.0";   
    }    
        
    public function getEmptyDataObject() {
        global $global;
        $obj = new stdClass();
        
        $obj->id = "";
        $obj->key = "";

        return $obj;
    }
    /*
    public function getLogin() {
        $obj = new stdClass();
        $obj->class = "btn btn-danger btn-block infn-sso"; 
        $obj->icon = "fas fa-unlock-alt"; 
        $obj->type = "InfnAAI"; 
        $obj->linkToDevelopersPage = "https://baltig.infn.it";
        return $obj;
    }
     * 
     */
    
    public function getLogin() {
        global $global;
        return $global['systemRootPath'] . 'plugin/LoginINFN/loginForm.php';
    }

    public function getCSSFiles() {
        return array("plugin/LoginINFN/infn_style.css");
    }

    public function getJSFiles() {
        if (!User::isLogged()) {
            return array("plugin/LoginINFN/buttonlogin.js");
        }
    }

    public function getFooterCode() {
        global $global;

        $content = '<script>'. file_get_contents($global['systemRootPath'] . 'plugin/LoginINFN/hidelogout.js').'</script>';
        $content .= '<script>'. file_get_contents($global['systemRootPath'] . 'plugin/LoginINFN/customldap.js').'</script>';
        return $content;
    }

}
