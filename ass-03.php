<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    function readArray($fp) {
        $texts = [];
        while(!feof($fp)) {
            $text = rtrim(fgets($fp));
            $texts[] = $text;
        }
        return $texts;
    }

    $fp = fopen($_SERVER['argv'][1], 'r');
    $text = implode(' ', readArray($fp));
    fclose($fp);

    $fp = fopen($_SERVER['argv'][2], 'r');
    $searchs = readArray($fp);
    fclose($fp);

    $names = array_filter($searchs, function($value) {
        return !empty($value);
    });

    array_walk($names, function(&$value) {
        $value = ucwords(strtolower($value));
    });

    $newText = str_ireplace($searchs, $names, $text);

    printf("%s\n", $newText);
