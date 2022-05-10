<?php


class Word {

    public function __construct(private $word){
    }

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param mixed $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }


    public function check($chars)
    {
        $arr_word = mb_str_split($this->getWord());
        foreach ( $chars as  $char) {
            $index = array_search($char, $arr_word);
            if ( $index != '' ) {
                unset($arr_word[$index]);
                $arr_word = array_values($arr_word);
            }
        }

        if (!count($arr_word))
            return true;
        return false;

    }

    public function __toString(): string
    {
        return  $this->getWord();
    }

}