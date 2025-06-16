<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BorrowingController extends Controller
{
    public function borrow(Book $book)
    {
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis.');
        }

        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        $book->decrement('stock');
        return back()->with('success', 'Buku berhasil dipinjam');
    }

    public function borrowList()
    {
        $books = Book::where('stock', '>', 0)->get(); // hanya tampilkan buku dengan stok
        return view('borrow.index', compact('books'));
    }

    public function returnList()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->whereNull('returned_at')
            ->get();

        return view('borrow.return', compact('borrowings'));
    }

    public function return(Borrowing $borrowing)
    {
        if ($borrowing->returned_at) {
            return back()->with('info', 'Buku sudah dikembalikan.');
        }

        $borrowing->update(['returned_at' => now()]);
        $borrowing->book->increment('stock');
        return back()->with('success', 'Buku berhasil dikembalikan');
    }

        // Menampilkan form pinjam buku
    public function showBorrowForm(Book $book)
    {
        return view('borrow.form', compact('book'));
    }

// Proses pinjam buku dengan input nama & kelas
    public function submitBorrow(Request $request, Book $book)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:20',
        ]);

        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis.');
        }

        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        $book->decrement('stock');

        return redirect()->route('borrow.book.list')->with('success', 'Buku berhasil dipinjam');
    }

    public function rekapPeminjaman()
    {
        $peminjaman = \App\Models\Borrowing::with('user', 'book')
            ->get();

        return view('rekap.peminjaman', compact('peminjaman'));
    }

    public function rekapPengembalian()
    {
        $pengembalian = \App\Models\Borrowing::with('user', 'book')
            ->whereNotNull('returned_at')
            ->get();

        return view('rekap.pengembalian', compact('pengembalian'));
    }

    public function exportPeminjaman()
    {
        $data = \App\Models\Borrowing::with('user', 'book')
            ->get();

        $pdf = Pdf::loadView('rekap.export-peminjaman', ['peminjaman' => $data]);
        return $pdf->download('rekap_peminjaman.pdf');
    }


}