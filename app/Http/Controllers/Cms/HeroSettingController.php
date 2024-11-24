<?php
// app/Http/Controllers/Cms/HeroSettingController.php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\HeroSetting;
use Illuminate\Http\Request;

class HeroSettingController extends Controller
{
    public function index()
    {
        $heroSetting = HeroSetting::first();
        return view('cms.pages.hero_settings', compact('heroSetting'));
    }

    public function update(Request $request)
    {
        $heroSetting = HeroSetting::first();

        if (!$heroSetting) {
            $heroSetting = new HeroSetting();
        }

        $heroSetting->update([
            'background_image' => $request->file('background_image') ? $request->file('background_image')->store('hero_images') : $heroSetting->background_image,
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'button_text' => $request->input('button_text'),
            'button_url' => $request->input('button_url')
        ]);

        return redirect()->back()->with('status', 'Hero section updated successfully.');
    }
}
