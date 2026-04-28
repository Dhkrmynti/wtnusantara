<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MikrotikSetting;
use Illuminate\Http\Request;

class MikrotikSettingController extends Controller
{
    public function index()
    {
        $setting = MikrotikSetting::first() ?? new MikrotikSetting();
        return view('admin.mikrotik.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
            'default_profile' => 'nullable|string|max:255',
            'isolir_profile' => 'nullable|string|max:255',
            'default_service' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $setting = MikrotikSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            MikrotikSetting::create($validated);
        }

        return redirect()->back()->with('success', 'Pengaturan Mikrotik berhasil disimpan!');
    }

    public function testConnection(MikrotikSetting $setting)
    {
        // Placeholder for real connection test logic
        return response()->json([
            'status' => 'success',
            'message' => 'Koneksi ke Mikrotik ' . $setting->host . ' berhasil! (Dummy)'
        ]);
    }
}
