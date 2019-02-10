<?php 

echo "HI CY !";

$content = "Hello CY";


$out.=$this->html->tag($content, 'div', 'class');

$name = $this->html->readRQ("name");
$date = $this->html->readRQd("date",1);

$greetings = "1st BI class, $name, $date";
$out.=$this->html->tag($greetings, 'h1', 'class');
echo $out;



