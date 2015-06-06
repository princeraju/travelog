
<?php	
require('../password_cluster.php');
require_once('clusterpoint/cps_simple.php');
$connectionStrings = array(	
  'tcp://cloud-eu-0.clusterpoint.com:9007',	
  'tcp://cloud-eu-1.clusterpoint.com:9007',	
  'tcp://cloud-eu-2.clusterpoint.com:9007',	
  'tcp://cloud-eu-3.clusterpoint.com:9007',	
);	
$cpsConn = new CPS_Connection(new CPS_LoadBalancer($connectionStrings), 'travelog', 'princeraju7777@gmail.com', $cluster_pw, 'document', '//document/id', array('account' => 920));	
//$cpsConn->setDebug(true);	
$cpsSimple = new CPS_Simple($cpsConn);	
?>