<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    $fp = fopen($_SERVER['argv'][1], 'r');

    fscanf($fp, "%s %s", $fname, $lname);
    fscanf($fp, "%d", $n);
    $trans = [];
    for($i = 0; $i < $n; $i++) {
        $tran = [];
        fscanf($fp, "%s %f", $tran['code'], $tran['value']);
        $trans[] = $tran;
    }

    fclose($fp);

    printf("Transaction for:\n");
    printf("%15s: %s\n", 'First name', $fname);
    printf("%15s: %s\n", 'Last name', $lname);
    printf("Number of transactions: %d\n", $n);
    $balance = 0;
    foreach($trans as list('code' => $code, 'value' => $value)) {
        $ncode = strtolower($code);
        switch($ncode) {
            case 'deposit':
            case 'transfer':
                $balance += $value;
                break;
            case 'withdraw':
                $balance -= $value;
                break;
        }
        printf("%15s: %20s\n", $code, number_format($value, 2));
    }

    printf("\n%15s: %20s\n", 'Account Balance', number_format($balance, 2));
