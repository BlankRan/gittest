<?php

$b = 1;
$a = array(
    'init' => '1111',
    'com' => '2222',
    'ccccccccc'
);

foreach ($a as $v)
{
    if ($b !=1 && ($a['init'] == $v || $a['com']==$v))
    {
        print_r(444);
        continue;
    }
    print_r($v);
}
//1231233131233