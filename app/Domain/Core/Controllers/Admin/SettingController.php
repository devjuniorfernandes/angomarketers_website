<?php

namespace App\Domain\Core\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Core\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'homepage_video_url' => Setting::get('homepage_video_url', ''),
            'homepage_video_show' => Setting::get('homepage_video_show', '0'),
            'ad_super_billboard_image' => Setting::get('ad_super_billboard_image', ''),
            'ad_super_billboard_url' => Setting::get('ad_super_billboard_url', ''),
            'ad_super_billboard_show' => Setting::get('ad_super_billboard_show', '0'),
            'ad_slim_leaderboard_image' => Setting::get('ad_slim_leaderboard_image', ''),
            'ad_slim_leaderboard_url' => Setting::get('ad_slim_leaderboard_url', ''),
            'ad_slim_leaderboard_show' => Setting::get('ad_slim_leaderboard_show', '0'),
            'system_site_name' => Setting::get('system_site_name', 'AngoMarketers'),
            'system_site_description' => Setting::get('system_site_description', ''),
            'system_contact_email' => Setting::get('system_contact_email', ''),
            'system_contact_whatsapp' => Setting::get('system_contact_whatsapp', ''),
            'system_facebook_url' => Setting::get('system_facebook_url', ''),
            'system_instagram_url' => Setting::get('system_instagram_url', ''),
            'system_linkedin_url' => Setting::get('system_linkedin_url', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'homepage_video_url' => 'nullable|url',
            'homepage_video_show' => 'nullable|in:0,1',
            'ad_super_billboard_url' => 'nullable|url',
            'ad_super_billboard_show' => 'nullable|in:0,1',
            'ad_slim_leaderboard_url' => 'nullable|url',
            'ad_slim_leaderboard_show' => 'nullable|in:0,1',
            'system_site_name' => 'required|string|max:255',
            'system_site_description' => 'nullable|string',
            'system_contact_email' => 'nullable|email',
            'system_contact_whatsapp' => 'nullable|string|max:255',
            'system_facebook_url' => 'nullable|string|max:255',
            'system_instagram_url' => 'nullable|string|max:255',
            'system_linkedin_url' => 'nullable|string|max:255',
            'ad_super_billboard_image_file' => 'nullable|image|max:4096',
            'ad_slim_leaderboard_image_file' => 'nullable|image|max:4096',
        ]);

        // Save normal text settings
        $keys = [
            'homepage_video_url',
            'system_site_name',
            'system_site_description',
            'system_contact_email',
            'system_contact_whatsapp',
            'system_facebook_url',
            'system_instagram_url',
            'system_linkedin_url',
            'ad_super_billboard_url',
            'ad_slim_leaderboard_url',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key, ''));
        }

        // Save toggles (explicitly default to 0 if not checked)
        Setting::set('homepage_video_show', $request->has('homepage_video_show') ? '1' : '0');
        Setting::set('ad_super_billboard_show', $request->has('ad_super_billboard_show') ? '1' : '0');
        Setting::set('ad_slim_leaderboard_show', $request->has('ad_slim_leaderboard_show') ? '1' : '0');

        // Handle Image Upload: Super Billboard Banner
        if ($request->hasFile('ad_super_billboard_image_file')) {
            $oldImage = Setting::get('ad_super_billboard_image');
            if ($oldImage && str_starts_with($oldImage, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $oldImage));
            }
            $path = $request->file('ad_super_billboard_image_file')->store('ads', 'public');
            Setting::set('ad_super_billboard_image', '/storage/' . $path);
        }

        // Handle Image Upload: Slim Leaderboard Banner
        if ($request->hasFile('ad_slim_leaderboard_image_file')) {
            $oldImage = Setting::get('ad_slim_leaderboard_image');
            if ($oldImage && str_starts_with($oldImage, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $oldImage));
            }
            $path = $request->file('ad_slim_leaderboard_image_file')->store('ads', 'public');
            Setting::set('ad_slim_leaderboard_image', '/storage/' . $path);
        }

        Cache::flush();

        return redirect()->route('admin.settings.index')->with('success', 'Configurações atualizadas com sucesso!');
    }
}
