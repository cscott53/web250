<h2>Fizz buzz bang</h2>
<?php
    $name=explode('_', $_GET['name']);
    $defWord=$_GET['defWord'];
    $count=$_GET['count'];
    $words=explode('_', $_GET['words']);
    $divisors=explode('_', $_GET['divisors']);
    $addLi=function($text) {
        echo "<li>$text</li>";
    };
    echo "<h3>Welcome, {$name[0]} {$name[1]} {$name[2]}!</h3>\n";
    echo "<ol>\n";
    for ($i=1; $i <= $count; $i++) { 
        $output='';
        for ($j=0; $j < 3; $j++)
            if ($i % $divisors[$j] == 0)
                $output.=' '.$words[$j];
        if ($output == '')
            $output=$defWord;
        if ($output[0] == ' ')
            $output=substr($output, 1);
        $addLi($output);
    }
    echo "</ol>";
?>