<?php

function format_uang ($angka) {
    return number_format($angka, 0, ',', '.');
}

function terbilang($angka) {
    $angka = abs($angka);
    $baca  = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
    $terbilang = '';

    if ($angka < 12) {
        $terbilang = $baca[$angka];
    } elseif ($angka < 20) {
        $terbilang = terbilang($angka - 10) . ' belas';
    } elseif ($angka < 100) {
        $terbilang = terbilang($angka / 10) . ' puluh ' . terbilang($angka % 10);
    } elseif ($angka < 200) {
        $terbilang = 'seratus ' . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        $terbilang = terbilang($angka / 100) . ' ratus ' . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        $terbilang = 'seribu ' . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        $terbilang = terbilang($angka / 1000) . ' ribu ' . terbilang($angka % 1000);
    } else {
        $terbilang = terbilang($angka / 1000000) . ' juta ' . terbilang($angka % 1000000);
    }

    return trim($terbilang);
}

function tambah_nol_didepan($value, $threshold = null)
{
    return sprintf("%0". $threshold . "s", $value);
}

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $nama_bulan = array(
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $dateTime = new DateTime($tgl);
    $tahun   = $dateTime->format('Y');
    $bulan   = $nama_bulan[$dateTime->format('n')];
    $tanggal = $dateTime->format('d');
    $text    = '';

    if ($tampil_hari) {
        $hari = $nama_hari[$dateTime->format('w')];
        $text .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text .= "$tanggal $bulan $tahun";
    }

    return $text; 
}
