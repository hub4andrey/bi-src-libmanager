<?php
$df=$this->html->readRQd('df');
$dt=$this->html->readRQd('dt');


$out = file_get_contents(APP_DIR.'/helpers/d3.steam.html');

// echo $this->html->pre_display($out,"result");
// exit;


$out=str_replace("<%json_url%>","?act=json&what=steam&df=$df&dt=$dt",$out);
$out=str_replace("<%title%>","Transactions analysis $df - $dt",$out);
echo $out;

//echo $this->html->pre_display($out,"result");
?>