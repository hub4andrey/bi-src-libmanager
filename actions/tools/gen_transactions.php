<?php 


if (!$access['main_admin']) { //Show error if not admin
    $this->html->error('');
}



//shortcut rq.

$args=[
	'year'=>$this->html->readRQn('year'),
	'qty'=>$this->html->readRQn('qty')
];


// $result =$this->project->gen_transactions(2018, 30);
$result =$this->project->gen_transactions($args);
$count = count($result[output][ids]);
//== shortcut err.
echo $this->html->message("$count new transactions created in ". $result[input][year]);
// echo $out;
echo $this->html->pre_display($result,"data content");


exit;

 ?>