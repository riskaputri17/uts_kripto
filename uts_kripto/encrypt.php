<?php
function vigenereEncrypt($password, $key) {
    // Your encryption logic here
}

// Example usage
$password = "secret123";
$key = "key";

try {
    $encrypted_password = vigenereEncrypt($password, $key);
    echo "Password Enkripsi: $encrypted_password";
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
?>
