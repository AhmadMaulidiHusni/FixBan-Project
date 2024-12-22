<?php

namespace App\Http\Controllers;

use App\Models\Transaksis;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksisController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksis = Transaksis::all(); // Ambil semua data transaksi
        return view('transaksis', compact('transaksis')); // Kirim data ke view
    }

    // Menerima pesanan
    public function approve($id)
    {
        $transaksi = Transaksis::findOrFail($id);
        $transaksi->update(['status' => 'Diterima']);

        return redirect()->route('transaksis')->with('success', 'Transaksi berhasil diterima.');
    }

    // Metode untuk menolak transaksi
    public function reject($id)
    {
        $transaksi = Transaksis::findOrFail($id);
        $transaksi->update(['status' => 'Ditolak']);

        return redirect()->route('transaksis')->with('success', 'Transaksi berhasil ditolak.');
    }

    public function riwayat()
    {
        $userName = Auth::user()->name; // Mengambil nama pengguna yang sedang login
        $transaksis = transaksis::where('nama_pelanggan', $userName)->get(); // Mengambil transaksi berdasarkan nama pengguna
        return view('User.RiwayatTransaksi', compact('transaksis')); // Kirim data transaksi ke view
    }

    public function prosesPembayaran(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'metode_pembayaran' => 'required|string|in:Transfer Bank,Cash',
        ]);

        $transaksi = Transaksis::findOrFail($request->transaksi_id);

        if ($transaksi->status != 'Diterima') {
            return redirect()->route('riwayat.transaksi')->with('error', 'Pembayaran hanya dapat dilakukan jika status Diterima.');
        }

        // Simpan data pembayaran
        Pembayaran::create([
            'transaksi_id' => $transaksi->id,
            'nama_pelanggan' => $transaksi->nama_pelanggan,
            'jasa' => $transaksi->jasa,
            'harga' => $transaksi->harga,
            'tanggal' => now(),
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => 'Lunas',
        ]);

        $transaksi->update(['status' => 'Lunas']);

        return redirect()->route('riwayat.transaksi')->with('success', 'Pembayaran berhasil dilakukan.');
    }


    public function getPembayaran($id)
    {
        $pembayaran = Pembayaran::where('transaksi_id', $id)->first();

        if (!$pembayaran) {
            return response()->json(['error' => 'Pembayaran belum dilakukan.'], 404);
        }

        return response()->json($pembayaran);
    }

    // Menghapus transaksi (Opsional)
    public function destroy($id)
    {
        $transaksi = Transaksis::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Data transaksi berhasil dihapus.');
    }
}
