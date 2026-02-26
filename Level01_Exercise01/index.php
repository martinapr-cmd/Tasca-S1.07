<?php


try {
    $a = 30 / 0;
    echo $a;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    echo "The error DivisionByZeroError will pop up :-P\n";
}
