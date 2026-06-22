<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$users = \App\Models\User::all(['id','username','role','email']);
echo "=== USERS IN DATABASE ===\n";
foreach ($users as $u) {
    echo "ID: {$u->id} | Username: {$u->username} | Role: {$u->role} | Email: {$u->email}\n";
}

echo "\n=== PASSWORD CHECK ===\n";
$tests = [
    'adminyayasan' => 'adminyayasan123',
    'adminpaud'    => 'adminpaud123',
    'adminsd'      => 'adminsd123',
    'adminsmp'     => 'adminsmp123',
];
foreach ($tests as $username => $pw) {
    $user = \App\Models\User::where('username', $username)->first();
    if ($user) {
        $ok = \Illuminate\Support\Facades\Hash::check($pw, $user->password);
        echo "$username: " . ($ok ? "✓ Password OK" : "✗ Password FAIL") . "\n";
    } else {
        echo "$username: USER NOT FOUND\n";
    }
}
