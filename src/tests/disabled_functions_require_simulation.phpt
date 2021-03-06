--TEST--
Disable functions - Require (simulation)
--SKIPIF--
<?php if (!extension_loaded("snuffleupagus")) die "skip"; ?>
--INI--
sp.configuration_file={PWD}/config/config_disabled_functions_require.ini
--FILE--
<?php 
$dir = __DIR__;
file_put_contents($dir . '/test.bla', "BLA\n");
file_put_contents($dir . '/test.sim', "MEH\n");
require $dir . '/test.bla';
require $dir . '/test.sim';
echo "1337\n";
?>
--EXPECTF--
BLA
[snuffleupagus][0.0.0.0][disabled_function][simulation] The call to the function 'require' in %a/disabled_functions_require_simulation.php:%d has been disabled, because its argument 'inclusion path' content (%a/test.sim) matched a rule.
MEH
1337
--CLEAN--
<?php
$dir = __DIR__;
unlink($dir . '/test.bla');
unlink($dir . '/test.sim');
?>
