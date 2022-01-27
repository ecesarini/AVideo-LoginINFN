<?php
$ldap = AVideoPlugin::getObjectData("LoginLDAP");
$redirectUri = getRedirectUri();
if (empty($redirectUri)) {
    $redirectUri = $global['webSiteRootURL'];
}
?>

<button id="LoginINFNButton" class="btn btn-danger btn-block infn-sso" style="background-color: rgb(0, 45, 75); border: 2px solid white;"><span class="fas fa-unlock-alt"></span>  INFN AAI</button>

<script>
    $(document).ready(function () {
        $('#LoginINFNButton').click(function () {
            avideoToast('Add your login code here, use ajax');
            avideoToastSuccess('if return true redirect the page');
            avideoToastError('if fails do nothing');
        });
    });
</script>