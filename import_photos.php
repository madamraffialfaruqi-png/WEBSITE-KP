<?php

use App\Models\Gallery;
use Illuminate\Support\Facades\File;

$directory = public_path('storage/gallery/umum');
$files = File::files($directory);

foreach ($files as $file) {
    $filename = $file->getFilename();
    $path = 'gallery/umum/' . $filename;
    
    // Check if already exists
    if (!Gallery::where('path', $path)->exists()) {
        Gallery::create([
            'unit' => 'umum',
            'path' => $path,
            'title' => str_replace(['_', '.', '(', ')', '-'], ' ', pathinfo($filename, PATHINFO_FILENAME))
        ]);
    }
}

echo "Berhasil mengimpor " . count($files) . " foto ke galeri.";
