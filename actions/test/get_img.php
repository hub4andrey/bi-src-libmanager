<?php
    //Show books
    if($sortby==''){$sortby="id asc";}

    $tmp=$this->html->readRQcsv('ids');
    if ($tmp!=''){$sql.=" and id in ($tmp)";}

    $tmp=$this->html->readRQn('list_id');
    if ($tmp>0){$sql.=" and list_id=$tmp";}

    $sql1="select *";
    $sql=" from books where id>0 $sql";

    $sql=$sql1.$sql;
    //$out.= $sql;



    //=== Andrew. Add debug table with prepared SQL request (what2display, div header):
    // echo $this->html->pre_display($sql, "SQL input");


    //=== Andrew. Modify list of columns in output html table:
    $fields=array('id','name','date','isbn','link','image','descr');
    // $fields=array('id','name','date','isbn','link','active','descr',);

    //$sort= $fields;
    $sort = array('name',);
    $out=$this->html->tablehead($what,$qry, $order, 'no_addbutton', $fields,$sort);

    if (!($cur = pg_query($sql))) {$this->html->HT_Error( pg_last_error()."<br><b>".$sql."</b>" );}
    $rows=pg_num_rows($cur);if($rows>0)$csv.=$this->data->csv($sql);




    //=== Andrew. Add html output with output from SQL request, in CSV format:
    // echo $this->html->pre_display($csv, "CSV input");



    while ($row = pg_fetch_array($cur)) {

        $link = $row[link];
        echo $this->html->pre_display($link,"link");



        $img = ($row[link]!='')? $this->project->get_book_img($row[link]) : '';
        $img = $this->project->get_book_img($row[link]);
        // echo $this->html->pre_display($img,"image");


    }

    eixt;