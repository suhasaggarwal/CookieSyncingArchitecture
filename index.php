<?php
require '../../vendor/autoload.php';

$id="1";
$ck="";
$a="";
$b="";
$rtime=date("Y-m-d H:i:s");





if(isset($_POST['ck'])){
$ck= $_POST['ck'];
}
else{
$ck="";
}

if(isset($_POST['b'])){
$b=$_POST['b'];
}
else{
$b="";
}

if(isset($_POST['a'])){
$a=$_POST['a'];
$a=urldecode($a);
}else{
$a="";
}





$data = array(
        'id' => $id,
        'cuberoot_cookie_id' => $ck,
        'cookie_id' => $a,
        'network_id' => $b,
		'sync_time' => $rtime
     );

  $param = array();

        $param['hosts'] = array("172.16.101.132:9200");
            //instantiating the client
    $client = new Elasticsearch\Client($param);

    $indexParams = array();
    $indexParams['index'] = 'cookiesyncindex';
    $indexParams['type'] = 'core2';
    // in case there's an error, PHP doesn't hang
    $indexParams['timeout'] = 2000;
    // this is an advanced feature we don't need right now
    $indexParams['consistency'] = 'one';


    $indexParams['body'] = $data;
    //and index it
    $client->index($indexParams);


?>