<?php
// Test 1
// $doc = new DomDocument;
// $doc->validateOnParse = true;
// $content=file_get_contents('https://www.livelib.ru/book/1002326231-garri-potter-i-uznik-azkabana-dzh-k-rouling');



// $doc->loadHtml($content);
// $desr=$doc->getElementById('full-description');
// echo $this->html->pre_display($desr->textContent,"desr");


echo $out.=$this->project->get_book_descr($id=1);


// Test 2
// $doc = new DomDocument;
// $doc->validateOnParse = true;
// $link = 'https://www.livelib.ru/book/1002326231-garri-potter-i-uznik-azkabana-dzh-k-rouling';
// $content=file_get_contents($link);
// $doc->loadHtml($content);
// $desr=$doc->getElementById('main-image-book');

// echo $this->html->pre_display($doc->savehtml($desr),"desr");
