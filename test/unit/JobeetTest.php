<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(9);

$t->comment('::slugfy()');
$t->is(Jobeet::slugfy('Sensio'), 'sensio', '::slugfy() convert all charactors to lower case');
$t->is(Jobeet::slugfy('sensio labs'), 'sensio-labs', '::slugfy() replaces a white space by a -');
$t->is(Jobeet::slugfy('sensio   labs'), 'sensio-labs', '::slugfy() replaces several white spaces by a single -');
$t->is(Jobeet::slugfy('  sensio'), 'sensio', '::slugfy() removes - at the beginning of a string');
$t->is(Jobeet::slugfy('sensio  '), 'sensio', '::slugfy() removes - at the end of a string');
$t->is(Jobeet::slugfy('paris, france'), 'paris-france', '::slugfy() replaces non-ASCII charactors by a -');
$t->is(Jobeet::slugfy(''), 'n-a', '::slugfy() converts the empty string to n-a');
$t->is(Jobeet::slugfy(' - '), 'n-a', 'slugfy() converts a string that only contains non-ASCII charactors to n-a');
if (function_exists('iconv'))
{
  $t->is(Jobeet::slugfy('Développeur Web'), 'developpeur-web', '::slugfy() removes accent');
}
else
{
  $t->skip('::slugfy() removes accents - iconv not installed');
}
