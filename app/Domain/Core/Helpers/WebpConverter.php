<?php

namespace App\Domain\Core\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebpConverter
{
    /**
     * Converts an uploaded image to WebP and stores it in the public disk.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int $quality
     * @return string The public URL of the saved file
     */
    public static function convertAndStore(UploadedFile $file, string $directory, int $quality = 80): string
    {
        $imageString = file_get_contents($file->getRealPath());
        $image = @imagecreatefromstring($imageString);

        if (!$image) {
            // Fallback to normal store if GD cannot read the image
            $path = $file->store($directory, 'public');
            return Storage::url($path);
        }

        // Convert palette image to true color to support webp format conversions properly
        if (function_exists('imagepalettetotruecolor')) {
            imagepalettetotruecolor($image);
        }
        
        imagealphablending($image, true);
        imagesavealpha($image, true);

        // Generate dynamic name
        $filename = Str::random(40) . '.webp';
        
        // Create a temporary path in workspace to make sure we don't violate paths constraints
        $tempDir = storage_path('app/temp');
        if (!file_exists($tempDir)) {
            @mkdir($tempDir, 0755, true);
        }
        $tempPath = $tempDir . '/' . $filename;
        
        imagewebp($image, $tempPath, $quality);
        imagedestroy($image);

        // Store file in public disk
        $storedPath = Storage::disk('public')->putFileAs($directory, new \Illuminate\Http\File($tempPath), $filename);
        
        // Clean up temp file
        @unlink($tempPath);

        return Storage::url($storedPath);
    }
}
