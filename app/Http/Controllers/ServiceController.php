<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\transaksis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Ambil semua data layanan
        $userTransactions = transaksis::where('nama_pelanggan', Auth::user()->name)->get(); // Ambil transaksi milik user yang login
        return view('Services', ['services' => $services, 'userTransactions' => $userTransactions]);
    }

    public function create()
    {
        return view('Service');
    }

    public function requestService(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk memesan layanan.');
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        // Tambahkan ke database transaksi
        transaksis::create([
            'nama_pelanggan' => $user->name,
            'jasa' => $service->name,
            'tanggal' => $validated['booking_date'],
            'harga' => $service->price,
        ]);

        return redirect()->route('user.services')->with('success', 'Pesanan berhasil diajukan.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        // Upload file gambar
        $image = $request->file('image')->store('services', 'public');

        // Simpan data ke database
        Service::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $image,
        ]);

        return redirect()->route('Services')->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('services', compact('service'));
    }

    public function order(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk memesan layanan.');
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date|after_or_equal:today',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        // Tambahkan ke database transaksi
        transaksis::create([
            'nama_pelanggan' => $user->name,
            'jasa' => $service->name,
            'tanggal' => $validated['tanggal'],
            'harga' => $service->price,
            'status' => 'Pending', // Status default
        ]);

        return response()->json(['message' => 'Pesanan berhasil diajukan.']);
    }
    
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }

            // Upload file baru
            $image = $request->file('image')->store('services', 'public');
            $service->image = $image;
        }

        $service->name = $validated['name'];
        $service->price = $validated['price'];
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Hapus gambar terkait jika ada (opsional, jika gambar disimpan di server)
        if (file_exists(public_path('services/' . $service->image))) {
            unlink(public_path('services/' . $service->image));
        }

        // Hapus layanan dari database
        $service->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('Services')->with('success', 'Layanan berhasil dihapus');
    }
}
