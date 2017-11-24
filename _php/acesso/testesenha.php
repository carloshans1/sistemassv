<?php
$string = 123;
$codificada = md5($string);
echo "Resultado da codificação usando md5 ($string): " . $codificada;
echo "<br/><br/>";
echo md5('123');
// 54cf74d1acdb4037ab956c269b63c8ac
echo "<br/><br/>";
echo "<br/><br/>";
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";
echo "<br/><br/>";
echo "<br/><br/>";


/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
$options='';
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options)."\n";
echo "<br/><br/>";
echo "<br/><br/>";

/* verificar senha */
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
} 
?>
