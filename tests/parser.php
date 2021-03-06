<?php

include '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL | E_NOTICE);

$parser = new Tale\Jade\Parser([
    'includePaths' => ['./views']
]);
?>
<table style="width: 100%;">
    <tr>
        <td style="width: 50%; border-right: 1px solid black; vertical-align: top;">
            <pre>
                <?php
                echo "\n<b>views/index.jade</b>\n";
                $i = 0;
                echo implode("\n", array_map(function($line) use(&$i) {

                    $i++;
                    return "$i: $line";
                }, explode("\n", file_get_contents('views/index.jade'))));

                $i = 0;
                echo "\n\n<b>views/layout-basic.jade</b>\n";
                echo implode("\n", array_map(function($line) use(&$i) {

                    $i++;
                    return "$i: $line";
                }, explode("\n", file_get_contents('views/layout-basic.jade'))));
                ?>
            </pre>
        </td>
        <td style="width: 50%; vertical-align: top;">
            <pre>
                <?php
                echo "\n<b>views/index.jade</b>\n";
                echo $parser->parse(file_get_contents('views/index.jade'));

                echo "\n\n<b>views/layout-basic.jade</b>\n";
                echo $parser->parse(file_get_contents('views/layout-basic.jade'));
                ?>
            </pre>
        </td>
    </tr>
</table>