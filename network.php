<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1); 
 
exec("ifconfig", $data);
$data = implode($data, "\n");
// print_r (preg_split("/\n\n/",$data));
// print($data);
$interfaces = array();
foreach (preg_split("/\n\n/", $data) as $int) {
 
preg_match("/^([A-z0-9]*\d)\s+Link\s+encap:([A-z]*)\s+HWaddr\s+([A-z0-9:]*).*" .
"inet addr:([0-9.]+).*Bcast:([0-9.]+).*Mask:([0-9.]+).*" .
"MTU:([0-9.]+).*Metric:([0-9.]+).*" .
"RX packets:([0-9.]+).*errors:([0-9.]+).*dropped:([0-9.]+).*overruns:([0-9.]+).*frame:([0-9.]+).*" .
"TX packets:([0-9.]+).*errors:([0-9.]+).*dropped:([0-9.]+).*overruns:([0-9.]+).*carrier:([0-9.]+).*" .
"RX bytes:([0-9.]+).*\((.*)\).*TX bytes:([0-9.]+).*\((.*)\)" .
"/ims", $int, $regex);

if (!empty($regex)) {
$interface = array();
$interface['name'] = $regex[1];
$interface['type'] = $regex[2];
$interface['mac'] = $regex[3];
$interface['ip'] = $regex[4];
$interface['broadcast'] = $regex[5];
$interface['netmask'] = $regex[6];

/*
$interface['mtu'] = $regex[7];
$interface['metric'] = $regex[8];
 
$interface['rx']['packets'] = (int) $regex[9];
$interface['rx']['errors'] = (int) $regex[10];
$interface['rx']['dropped'] = (int) $regex[11];
$interface['rx']['overruns'] = (int) $regex[12];
$interface['rx']['frame'] = (int) $regex[13];
$interface['rx']['bytes'] = (int) $regex[19];
$interface['rx']['hbytes'] = (int) $regex[20];
 
$interface['tx']['packets'] = (int) $regex[14];
$interface['tx']['errors'] = (int) $regex[15];
$interface['tx']['dropped'] = (int) $regex[16];
$interface['tx']['overruns'] = (int) $regex[17];
$interface['tx']['carrier'] = (int) $regex[18];
$interface['tx']['bytes'] = (int) $regex[21];
$interface['tx']['hbytes'] = (int) $regex[22];
 */
 
$interfaces[] = $interface;

}

}


print_r($interfaces);
?>