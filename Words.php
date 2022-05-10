<?php
class Words {

    private $words = [];

    public function __construct( ){
    }

    public function load($path)
    {
        $file_content = file_get_contents($path);
        foreach (explode( PHP_EOL, $file_content ) as $w) {
            $w = trim($w);
            if ($w)
                $this->words[] = new Word($w);
        }
    }

    public function count()
    {
        return count( $this->words );
    }

    public function check($chars)
    {
        $res = [];
        foreach ($this->words as $word) {
            if ($word->check( $chars ))
                $res[] = $word;
        }
        return $res;
    }

}