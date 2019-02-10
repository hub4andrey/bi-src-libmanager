<?php
    //Edit books_transactions
    if ($act=='edit'){
        $sql="select * from $what WHERE id=$id";
        $res=$this->db->GetRow($sql);
    }else{
        $sql="select * from $what WHERE id=$refid";
        $res2=$this->db->GetRow($sql);
        $res[active]='t';
    }

    $form_opt['well_class']="span11 columns form-wrap";

    $out.=$this->html->form_start($what,$id,'',$form_opt);
    $out.="<hr>";

    $out.=$this->html->form_hidden('reflink',$reflink);
    $out.=$this->html->form_hidden('id',$id);
    $out.=$this->html->form_hidden('reference',$reference);
    $out.=$this->html->form_hidden('refid',$refid);

    $out.=$this->html->form_text('name',$res[name],'Name','',0,'span12');
$out.=$this->html->form_date('date',$res[date],'Date','',0,'span12');

    $user_id=$this->data->listitems('user_id',$res[user_id],'user','span12');
        $out.= "<label>User</label>$user_id";

    $entity_id=$this->data->listitems('entity_id',$res[entity_id],'entity','span12');
        $out.= "<label>Entity</label>$entity_id";

    $type_id=$this->data->listitems('type_id',$res[type_id],'type','span12');
        $out.= "<label>Type</label>$type_id";

    $book_id=$this->data->listitems('book_id',$res[book_id],'book','span12');
        $out.= "<label>Book</label>$book_id";
$out.=$this->html->form_date('date_from',$res[date_from],'Date from','',0,'span12');
$out.=$this->html->form_date('date_to',$res[date_to],'Date to','',0,'span12');
$out.=$this->html->form_text('rating',$res[rating],'Rating','',0,'span12');
$out.=$this->html->form_chekbox('active',$res[active],'Active','',0,'span12');
$out.=$this->html->form_textarea('descr',$res[descr],'Descr','',0,'','span12');


    $out.=$this->html->form_confirmations();
    $out.=$this->html->form_submit('Save');
    $out.=$this->html->form_end();
    
    $body.=$out;
    