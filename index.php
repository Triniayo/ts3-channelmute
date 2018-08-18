<?php
    /**
     * Description
     * Simple way to mute/unmute a desired TeamSpeak3 Channel.
     * 
     * Author
     * Triniayo (https://github.com/Triniayo)
     * 
     * Github Link
     * https://github.com/Triniayo/ts3-channelmute
     */

    /************************************************/
    /****************CODE BEGINS HERE****************/
    /************************************************/
    
    /**
     * Initializing the API
     */
    require_once("libraries/TeamSpeak3/TeamSpeak3.php");

    /**
     * TeamSpeak3 Login Credentials
     */
    $username = 'serveradmin';
    $password = 'changeme';
    $ip = '127.0.0.1';
    $port ='9987';

    /**
     * TeamSpeak3 ServerQuery URL
     */
    $url = "serverquery://$username:$password@$ip:10011/?server_port=$port";

    /**
     * Creating object of the API
     */
    $api = new TeamSpeak3();

    /**
     * Setting the PermissionID for Talk Power here
     */
    $permission = 221;

    /**
     * Actual Code + Error Reporting (if there is any)
     */
    try {
        // Logging into the TS3 Server Query
        $ts3 = $api->factory($url);

        // Muting the Channel
        $ts3->channelGetById(301)->permAssign($permission, 1);

    } catch (Exception $error) {
        echo "ERROR: ". $error->getMessage();
    }

    /**
     * END OF THE PHP PART
     */
?>