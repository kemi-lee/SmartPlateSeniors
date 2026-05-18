<?php
echo "Loaded php.ini: " . php_ini_loaded_file() . "<br>";
echo "PDO drivers: ";
print_r(PDO::getAvailableDrivers());
echo "<br>Extensions: ";
print_r(get_loaded_extensions());
?>
