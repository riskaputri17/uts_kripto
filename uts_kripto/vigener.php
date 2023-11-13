<?php
function vigenereEncrypt($password, $key) {
    $password = preg_replace('/[^A-Za-z]/', '', strtoupper($password)); // Mengabaikan karakter non-alfabet dan membuat huruf besar
    $key = strtoupper($key);
    $encrypted = "";

    if (empty($password) || empty($key)) {
        throw new InvalidArgumentException("Panjang password dan kunci harus lebih dari 0.");
    }

    for ($i = 0, $j = 0; $i < strlen($password); $i++) {
        if (ctype_alpha($password[$i])) {
            $offset = ord('A');
            $encrypted .= chr((ord($password[$i]) + ord($key[$j % strlen($key)]) - 2 * $offset) % 26 + $offset);
            $j++;
        } else {
            $encrypted .= $password[$i];
        }
    }

    return $encrypted;
}

// Contoh penggunaan
$password = "secret123";
$key = "key";

try {
    $encrypted_password = vigenereEncrypt($password, $key);
    echo "Password Enkripsi: $encrypted_password";
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
?>
