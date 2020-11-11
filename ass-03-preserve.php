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
    $texts = readArray($fp);
    $text = implode(' ', $texts);
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
    list('result' => $outputs) = array_reduce($texts, function($carry, $text) {
        $len = strlen($text);
        $carry['result'][] =  substr($carry['text'], 0, $len);
        $carry['text'] = substr($carry['text'], $len + 1);
        return $carry;
    }, ['result' => [], 'text' => $newText]);
    $outputText = implode("\n", $outputs);

    printf("%s\n", $outputText);
