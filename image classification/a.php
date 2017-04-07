<?php
exec("python ./classify_image.py",$output, $return_var);
var_dump($return_var);
// exec('whoami', $output, $return_var);


