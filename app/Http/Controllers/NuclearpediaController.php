<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser; // Import library PDF parser

class NuclearpediaController extends Controller
{
    public function showDetail()
    {
        // Path ke file
        $filePath = storage_path('app/public/nuclearpedia/tes1.docx');

        // Periksa apakah file ada
        if (!file_exists($filePath)) {
            return view('Template.nuclearpediaDetail', ['content' => "File materi tidak ditemukan."]);
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($extension === 'docx') {
            // Load file .docx using PhpWord
            $phpWord = IOFactory::load($filePath, 'Word2007');

            // Ekstrak teks dari file DOCX per paragraf
            $content = '';
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        $paragraphText = '';
                        foreach ($element->getElements() as $childElement) {
                            if ($childElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                $paragraphText .= $childElement->getText();
                            }
                        }
                        $content .= $paragraphText . "\n\n"; // Tambahkan jeda satu baris antar paragraf
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $content .= $element->getText() . "\n\n"; // Tambahkan jeda satu baris antar paragraf
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Title) {
                        $content .= $element->getText() . "\n\n"; // Tambahkan jeda satu baris antar paragraf
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\ListItem) {
                        $content .= $element->getText() . "\n\n"; // Tambahkan jeda satu baris antar paragraf
                    }
                }
            }
        } elseif ($extension === 'pdf') {
            // Load file .pdf using smalot/pdfparser
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath); // Parse file PDF

            // Gabungkan teks dari semua halaman
            $fullText = '';
            $pages = $pdf->getPages(); // Ambil semua halaman
            foreach ($pages as $page) {
                $fullText .= $page->getText() . "\n"; // Gabungkan teks dari setiap halaman
            }

            // Proses teks untuk memisahkan paragraf berdasarkan indentasi
            $content = '';
            $lines = explode("\n", $fullText); // Pisahkan teks per baris
            $paragraph = '';
            $isNewParagraph = false;

            foreach ($lines as $line) {
                $line = trim($line); // Hilangkan spasi di awal dan akhir baris

                // Jika baris dimulai dengan indentasi (tab atau spasi), itu adalah awal paragraf baru
                if (preg_match('/^\s+/', $line)) {
                    // Jika sudah ada paragraf sebelumnya, simpan ke $content dengan jeda satu baris
                    if (!empty($paragraph)) {
                        $content .= $paragraph . "\n\n"; // Jeda satu baris antar paragraf
                        $paragraph = ''; // Reset paragraf
                    }
                    $paragraph .= $line . ' '; // Mulai paragraf baru
                    $isNewParagraph = true;
                } else {
                    // Jika baris tidak dimulai dengan indentasi, itu adalah lanjutan paragraf sebelumnya
                    if ($isNewParagraph) {
                        $paragraph .= $line . ' ';
                    } else {
                        // Jika bukan paragraf baru, tambahkan ke paragraf sebelumnya
                        $paragraph .= $line . ' ';
                    }
                }
            }

            // Simpan paragraf terakhir dengan jeda satu baris
            if (!empty($paragraph)) {
                $content .= $paragraph . "\n\n"; // Jeda satu baris antar paragraf
            }
        } else {
            return view('Template.nuclearpediaDetail', ['content' => "Format file tidak didukung."]);
        }

        // Kirim data teks ke view
        return view('Template.nuclearpediaDetail', ['content' => $content]);
    }
}