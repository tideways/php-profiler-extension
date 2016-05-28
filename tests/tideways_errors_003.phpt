--TEST--
Tideways: tideways_last_fatal_error() for B/C reasons
--SKIPIF--
<?php
if (PHP_VERSION_ID < 70000) { echo "skip: php7 only\n"; }
if (defined('PHP_WINDOWS_VERSION_MAJOR')) {
    die("skip: Windows has different output format.");
}
--FILE--
<?php

register_shutdown_function(function() {
    var_dump(tideways_last_fatal_error());
});

foo();
--EXPECTF--
%s: Call to undefined function foo() in %s
Stack trace:
#0 {main}
  thrown in %s on line 7
array(4) {
  ["type"]=>
  int(1)
  ["message"]=>
  string(%d) "%sCall to undefined function foo()%s
Stack trace:
#0 {main}
  thrown"
  ["file"]=>
  string(%d) "%s"
  ["line"]=>
  int(7)
}
