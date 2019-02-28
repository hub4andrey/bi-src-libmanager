<?php
$chart=array(
    "caption"=> "By transaction types",
    "subCaption"=> "",
    "paletteColors"=> "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
    "numberPrefix"=> "",
    "showBorder"=> "0",
    "use3DLighting"=> "0",
    "enableSmartLabels"=> "1",
    "startingAngle"=> "310",
    "showLabels"=> "1",
    "showPercentValues"=> "1",
    "showLegend"=> "1",
    //"defaultCenterLabel"=> $this->utils->bytes2h($ds),
    //"centerLabel"=> $this->utils->bytes2h($ds),
    //"centerLabelBold"=> "1",
    "showTooltip"=> "1",
    "decimals"=> "0",
    "useDataPlotColorForLabels"=> "1",
    "theme"=> "fint"
);



$sql="SELECT * FROM listitems WHERE list_id=101";

if (!($cur = pg_query($sql))) {$this->html->SQL_error($sql);}    
$rows=pg_num_rows($cur);$start_time=$this->utils->get_microtime();
//if($rows>0)$csv=$this->data->csv($sql);
while ($row = pg_fetch_array($cur,NULL,PGSQL_ASSOC)){
    $arr1[$row[name]]=$this->db->getval("SELECT count(*) from books_transactions where type_id = $row[id]");
}
// echo $this->html->pre_display($arr1,"result");
// exit;

// $arr1['aquisition']=$this->db->getval("SELECT count(*) from books_transactions where type_id = 1");
// $arr1['check-out']=$this->db->getval("SELECT count(*) from books_transactions where type_id = 2");
// $arr1['check-in']=$this->db->getval("SELECT count(*) from books_transactions where type_id = 3");
// $arr1['disposals']=$this->db->getval("SELECT count(*) from books_transactions where type_id = 4");

$data=$this->utils->array2array($arr1, 'label', 'value');


// echo $this->html->pre_display($arr1,"result");
// echo $this->html->pre_display($data,"result");

$FC_array=array('chart'=>$chart,'data'=>$data);

// echo $this->html->pre_display($FC_array,"result");

$jsonEncodedData = json_encode($FC_array);



$chart1 =$this->utils->chart_js_new('pie2d', 600, 400, 'chart-1', $jsonEncodedData);

//=== compose few charts:
// $chart1 =
// $chart1 .=
// $chart1 .=


// echo $chart1;
$body .= $chart1;




