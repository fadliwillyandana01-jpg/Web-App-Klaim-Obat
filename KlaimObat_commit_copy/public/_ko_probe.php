<?php
// FILE SEMENTARA UNTUK DIAGNOSA - akan dihapus lagi
header('Content-Type: text/plain');
$p = 'D:\\xampp\\tmp';
echo "PROBE2\n";
echo 'is_dir=' . var_export(is_dir($p), true) . "\n";
echo 'is_writable=' . var_export(is_writable($p), true) . "\n";
echo 'realpath=' . var_export(realpath($p), true) . "\n";
$ok = @file_put_contents($p . '\\_ko_write_test.txt', 'x');
echo 'file_put_contents=' . var_export($ok, true) . "\n";
echo 'last_error=' . json_encode(error_get_last()) . "\n";
if ($ok !== false) {
    echo 'read_back=' . @file_get_contents($p . '\\_ko_write_test.txt') . "\n";
    @unlink($p . '\\_ko_write_test.txt');
}
echo 'upload_tmp_dir=' . (string) ini_get('upload_tmp_dir') . "\n";
echo 'tmp_name_dari_upload=' . ($_FILES['proof']['tmp_name'] ?? '-') . "\n";
echo 'upload_error=' . ($_FILES['proof']['error'] ?? '-') . "\n";
