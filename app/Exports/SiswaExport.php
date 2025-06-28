<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SiswaExport implements FromView, WithTitle, WithEvents, ShouldAutoSize
{
    public $siswa;
    public $akademik;
    public $registrasi_fee;
    public $spi_fee;
    public $maxAngsuranRegistrasi;

    public function title(): string
    {
        return 'Data Siswa';
    }

    public function __construct($siswa, $akademik, $registrasi_fee, $spi_fee, $maxAngsuranRegistrasi = null)
    {
        $this->siswa = $siswa;
        $this->akademik = $akademik;
        $this->registrasi_fee = $registrasi_fee;
        $this->spi_fee = $spi_fee;
        $this->maxAngsuranRegistrasi = $maxAngsuranRegistrasi ?? $siswa->max(function ($item) {
            return $item->paymentsSummary->angsuran_registration ?? 0;
        });
    }

    public function view(): View
    {
        return view('exports.siswa', [
            'siswa' => $this->siswa,
            'akademik' => $this->akademik,
            'registrasi_fee' => $this->registrasi_fee,
            'spi_fee' => $this->spi_fee,
            'maxAngsuranRegistrasi' => $this->maxAngsuranRegistrasi,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // AUTO WIDTH sudah dihandle oleh ShouldAutoSize
    
                // Hitung baris terakhir
                $rowCount = count($this->siswa) + 5; // 5 baris pertama buat header
    
                // Hitung kolom terakhir (misal sampai kolom T -> ubah sesuai kebutuhanmu)
                $colCount = 3 + $this->maxAngsuranRegistrasi + 1 + 5 + 2;
                $lastCol = Coordinate::stringFromColumnIndex($colCount);

                // Apply border
                $event->sheet->getDelegate()->getStyle("A4:{$lastCol}{$rowCount}")
                    ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

                $event->sheet->getStyle("D6:{$lastCol}{$rowCount}")
                    ->getNumberFormat()
                    ->setFormatCode('[$Rp-421]* #,##0_ ;[Red]\-[$Rp-421]* #,##0_ ');

                // Rata tengah semua header (baris 4 & 5)
                $event->sheet->getDelegate()->getStyle("A4:{$lastCol}5")
                    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);
            },
        ];
    }
}
