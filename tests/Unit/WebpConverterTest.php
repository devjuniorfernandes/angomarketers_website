<?php

namespace Tests\Unit;

use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WebpConverterTest extends TestCase
{
    /**
     * Test image conversion to webp and storage.
     */
    public function test_image_conversion_to_webp(): void
    {
        Storage::fake('public');

        // Create a fake JPG image upload
        $fakeFile = UploadedFile::fake()->image('test_image.jpg', 100, 100);

        // Convert and store the image using WebpConverter
        $url = WebpConverter::convertAndStore($fakeFile, 'test_dir');

        // Assert that the file is stored in public disk under test_dir and has .webp extension
        $this->assertNotEmpty($url);
        $this->assertStringContainsString('test_dir', $url);
        $this->assertStringEndsWith('.webp', $url);

        // Map public URL path to storage relative path
        $filename = basename($url);
        Storage::disk('public')->assertExists('test_dir/' . $filename);
    }
}
