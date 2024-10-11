<?php

class Book {
    protected $title;
    protected $author;
    protected $publicationYear;

    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }

    public function getDetails () { 
        return
        "Judul Buku: " . $this->title . "<br>" . 
        "Penulis: " . $this->author . "<br>" .
        "Tahun Terbit: " . $this->publicationYear;
    }
}

class EBook extends Book {
    private $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->fileSize = $fileSize;
    }

    public function getDetails() {
        return parent::getDetails() . "<br>" . 
               "Garansi: " . $this->fileSize . "MB";
    }

}
        
class PrintedBook extends Book {
    private $numberOfPages;

    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->numberOfPages = $numberOfPages;
    }

    public function getDetails() {
        return parent::getDetails() . "<br>" . 
               "Garansi: " . $this->numberOfPages . "pages";
    }

}

    
