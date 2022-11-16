<?php

namespace App\Helpers;

class SeoHelper
{
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $url_canonical;
    public $data_seo;

    public function __construct($title, $keyword, $description, $url_canonical){  
        $this->meta_title = $title;
        $this->meta_keyword = $keyword;
        $this->meta_description = $description;
        $this->url_canonical = $url_canonical;

        return $this->data_seo = [
            'meta_title' => $this->meta_title, 
            'meta_keyword' =>$this->meta_keyword, 
            'meta_description' =>$this->meta_description, 
            'url_canonical' =>$this->url_canonical
        ];
    }
}
