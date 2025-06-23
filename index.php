<?php
error_reporting(E_ALL);



class BracketCheker 
{
    private string $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function isValid() {
        $arr = [];
        
        for ($i = 0; $i < strlen($this->code); $i++) {
            $char = $this->code[$i];

            if ($char === '{') {
                array_push($arr, $char);
            } elseif ($char === '}') {
                if (empty($arr)) {
                    return false;
                }
                array_pop($arr);
            }
        }

        if (empty($arr)) {
            return "{$this->code} - " . "\x1b[32;1m" . "True" . "\x1b[0m" . PHP_EOL;
        } else {
            return "{$this->code} - " . "\x1b[31;1m" . "False" . "\x1b[0m" . PHP_EOL;
        }
        // return empty($arr);
    }

}



$str_one = new BracketCheker("{{lajkdhf{adfa}{}adfasdfadf{}}}");
$str_two = new BracketCheker("{{lajkdhf{adfa");




echo $str_one->isValid();
echo $str_two->isValid();