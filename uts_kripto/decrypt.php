<?php
function Decrypt($ciphertext, $key) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $decryptedText = '';

    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];
        if (strpos($key, $char) !== false) {
            $charIndex = strpos($key, $char);
            $alphabetIndex = $charIndex % strlen($alphabet);
            $plainChar = $alphabet[$alphabetIndex];
            $decryptedText .= $plainChar;
        }
    }

    return $decryptedText;
}

if(isset($_POST['submit'])) {
    $plainText = strtolower($_POST['plainText']);
    $key = strtolower($_POST['key']);

    $abjad = "abcdefghijklmnopqrstuvwxyz";
    $hasil = $key . $abjad;
    $key = implode("", array_unique(str_split($hasil)));

    $hasilEnkripsi = Decrypt(str_replace(" ", "", $plainText), $key);

}

?>
