<?php

function uang_indonesia($angka) {
    return number_format($angka, 0, ',', '.');
}

function baca_angka($angka) {
    $angka = abs($angka);
    $baca  = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
    $baca_angka = '';

    if ($angka < 12) {
        $baca_angka = $baca[$angka];
    } elseif ($angka < 20) {
        $baca_angka = baca_angka($angka - 10) . ' belas';
    } elseif ($angka < 100) {
        $baca_angka = baca_angka($angka / 10) . ' puluh ' . baca_angka($angka % 10);
    } elseif ($angka < 200) {
        $baca_angka = 'seratus ' . baca_angka($angka - 100);
    } elseif ($angka < 1000) {
        $baca_angka = baca_angka($angka / 100) . ' ratus ' . baca_angka($angka % 100);
    } elseif ($angka < 2000) {
        $baca_angka = 'seribu ' . baca_angka($angka - 1000);
    } elseif ($angka < 1000000) {
        $baca_angka = baca_angka($angka / 1000) . ' ribu ' . baca_angka($angka % 1000);
    } else {
        $baca_angka = baca_angka($angka / 1000000) . ' juta ' . baca_angka($angka % 1000000);
    }

    return trim($baca_angka);
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
