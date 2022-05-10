<?php
class Bot {
    private $words;
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @param mixed $words
     */
    public function setWords($words)
    {
        $this->words = $words;
    }

    /**
     * @return mixed
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * @param mixed $chars
     */
    public function setChars($chars)
    {
        $this->chars = $chars;
    }



    public function check( $chars ){
        return array_unique($this->getWords()->check($chars));
    }

}