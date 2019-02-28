<?php 


$doc = new DomDocument;
$doc->validateOnParse = true;

// $link=$this->data->get_val('books','link',$id);
// echo $this->html->pre_display($id,"link from books");
// $link = 'https://www.livelib.ru/book/1002326231-garri-potter-i-uznik-azkabana-dzh-k-rouling';

$content=file_get_contents($link);



$doc->loadHtml($content);
$desr=$doc->getElementById('main-image-book');


// echo $this->html->pre_display($desr->textContent,"desr");
// echo $this->html->pre_display($doc->savehtml($desr),"from GET book IMG function");

$result=$doc->savehtml($desr);
echo $this->html->pre_display($result,"from GET book IMG function");

return $result;


 ?>