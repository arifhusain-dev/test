<?php
$cfgPort    = "80";                //port, 22 if SSH
$cfgTimeOut = "5";
$cfgServer ="127.0.0.1";

$f=fsockopen("$cfgServer",$cfgPort,$cfgTimeOut);

if (!$f)
{
    echo "<pre>";
    echo "not connected\\r\
";

}
else {
    echo "<pre>";
    echo "connected\\r\
";
}