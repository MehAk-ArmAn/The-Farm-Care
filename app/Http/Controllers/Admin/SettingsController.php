<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings', ['settings' => SiteSetting::allAsArray()]);
    }

    public function update(Request $request)
    {
        foreach ($request->except(['_token', '_method', 'logo']) as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['group' => $this->group($key), 'value' => (string) $value, 'type' => 'text']
            );
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('branding', 'public');
            SiteSetting::updateOrCreate(
                ['key' => 'logo'],
                ['group' => 'branding', 'value' => $path, 'type' => 'image']
            );
        }

        return back()->with('success', 'Website settings updated. The logo is also used as the favicon.');
    }

    private function group(string $key): string
    {
        if (str_starts_with($key, 'nav_') || str_starts_with($key, 'header_') || $key === 'mobile_menu_label') return 'navigation';
        if (str_starts_with($key, 'footer_')) return 'footer';
        if (str_starts_with($key, 'product_')) return 'product_pages';
        if (str_starts_with($key, 'social_')) return 'social';
        if (str_starts_with($key, 'hero_')) return 'homepage';
        if (str_contains($key, 'office') || in_array($key, ['phone', 'email'])) return 'contact';
        return 'general';
    }
}
