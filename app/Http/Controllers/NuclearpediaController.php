<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser;
use App\Models\Nuclearpedia;
use App\Models\Item;
use App\Models\Image;

class NuclearpediaController extends Controller
{
    /**
     * Menampilkan daftar semua item Nuclearpedia.
     */
    public function index()
    {
        // Ambil semua Item beserta gambar
        $nuclearpediaItems = Item::with('image')->get();

        return view('landing_page.index', compact('nuclearpediaItems'));
    }

    /**
     * Menampilkan isi materi berdasarkan slug.
     */
    public function showDetailBySlug($slug)
    {
        // Cari file Nuclearpedia berdasarkan slug item
        $fileRecord = Nuclearpedia::whereHas('item', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('item')->first();

        // Jika file tidak ditemukan, tampilkan pesan error
        if (!$fileRecord) {
            return view('Template.nuclearpediaDetail', [
                'title' => 'Tidak Ditemukan',
                'author' => '-',
                'date' => '-',
                'content' => 'File tidak ditemukan di database.',
                'image' => []
            ]);
        }

        // Ambil semua gambar terkait hanya jika file ditemukan
        $image = Image::where('item_id', $fileRecord->item->id)->get();
        // dd($image); 


        // Path ke file dalam storage
        $filePath = storage_path('app/public/' . $fileRecord->file_path);
        $filePath = str_replace('\\', '/', $filePath);
        // dd($filePath, file_exists($filePath));
        // dd(Storage::disk('public')->exists($fileRecord->file_path));


        
        // Periksa apakah file ada
        if (!file_exists($filePath)) {
            return view('Template.nuclearpediaDetail', [
                'title' => $fileRecord->item->title ?? 'Tanpa Judul',
                'author' => $fileRecord->item->author ?? '-',
                'date' => $fileRecord->created_at->format('d M Y'),
                'content' => 'File materi tidak ditemukan.',
                'image' => $image,
            ]);
        }

        // Tentukan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Ekstrak konten dari file
        if ($extension === 'docx') {
            $content = $this->extractDocxText($filePath);
        } elseif ($extension === 'pdf') {
            $content = $this->extractPdfText($filePath);
        } else {
            $content = 'Format file tidak didukung.';
        }

        return view('Template.nuclearpediaDetail', [
            'title' => $fileRecord->item->title ?? 'Tanpa Judul',
            'author' => $fileRecord->item->author ?? '-',
            'date' => $fileRecord->created_at->format('d M Y'),
            'content' => $content,
            'image' => $image,
        ]);
    }

    /**
     * Ekstrak teks dari file DOCX.
     */
    private function extractDocxText($filePath)
    {
    try {
        $phpWord = IOFactory::load($filePath);
        $paragraphs = [];

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                $textContent = '';

                // Jika elemen adalah TextRun (paragraf dengan beberapa elemen teks)
                if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    foreach ($element->getElements() as $textElement) {
                        if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                            $textContent .= $textElement->getText();
                        }
                    }
                } elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                    // Jika elemen langsung berupa teks
                    $textContent = $element->getText();
                }

                // Jika ada konten, tambahkan sebagai paragraf
                if (!empty($textContent)) {
                    $paragraphs[] = trim($textContent);
                }
            }
        }

        // Gabungkan semua paragraf dengan enter sebagai pemisah
        return implode("\n\n", $paragraphs);
    } catch (\Exception $e) {
        Log::error("Error membaca DOCX: " . $e->getMessage());
        return "Gagal membaca file DOCX.";
    }
    }

    /**
     * Ekstrak teks dari file PDF.
     */
    private function extractPdfText($filePath)
{
    try {
        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();

        $lines = explode("\n", trim($text));
        $paragraphs = [];
        $currentParagraph = '';
        $prevLine = '';
        $shortLineThreshold = 0.6; // Jika panjang baris < 60% dari sebelumnya, dianggap pendek
        $buffer = ''; // Buffer untuk menangani baris pendek

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line)) {
                continue; // Abaikan baris kosong sepenuhnya
            }

            // Cek apakah panjang baris jauh lebih kecil dibanding sebelumnya
            if (!empty($prevLine) && strlen($line) < $shortLineThreshold * strlen($prevLine)) {
                // Simpan sementara dalam buffer (jangan langsung buat paragraf baru)
                $buffer .= (empty($buffer) ? '' : ' ') . $line;
            } else {
                // Jika buffer sudah ada, gabungkan dengan paragraf sebelumnya
                if (!empty($buffer)) {
                    $currentParagraph .= ' ' . trim($buffer);
                    $buffer = ''; // Reset buffer
                }

                // Jika paragraf baru
                if (!empty($prevLine) && strlen($prevLine) < $shortLineThreshold * strlen($line)) {
                    if (!empty($currentParagraph)) {
                        $paragraphs[] = trim($currentParagraph);
                        $currentParagraph = '';
                    }
                }

                $currentParagraph .= (empty($currentParagraph) ? '' : ' ') . $line;
            }

            $prevLine = $line;
        }

        // Tambahkan buffer terakhir ke paragraf sebelumnya
        if (!empty($buffer)) {
            $currentParagraph .= ' ' . trim($buffer);
        }

        // Simpan paragraf terakhir
        if (!empty($currentParagraph)) {
            $paragraphs[] = trim($currentParagraph);
        }

        return implode("\n\n", $paragraphs);
    } catch (\Exception $e) {
        Log::error("Error membaca PDF: " . $e->getMessage());
        return "Gagal membaca file PDF.";
    }
}

}
