<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    /**
     * This use printf %0... for formatting 0 padding.
     */
    $pattern = $_SERVER['argv'][1];
    $prefix = substr($pattern, 0, 2);
    $pattern = substr($pattern, 2);
    $start = (int)$pattern;
    $len = strlen($pattern);

    $fp = fopen($_SERVER['argv'][2], 'r');
    fscanf($fp, "%d", $n);
    for($i = 0; $i < $n; $i++) {
        $name = trim(fgets($fp));
        printf("%s%0{$len}d %s\n", $prefix, $start + $i, $name);
    }
    fclose($fp);
