<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Models\Akademik;
use App\Models\PaymentsSummary;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'akademik' => Akademik::orderBy('tahun_akademik', 'desc')->get(),
        ];
        // Go to view siswa.index and send the data from model.
        return view("siswa.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'akademik' => Akademik::orderBy('tahun_akademik', 'desc')->get(),
        ];
        // Go to view siswa.add
        return view("siswa.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request, Siswa $siswa)
    {
        // Validate the request and create a new siswa record
        $siswa->create([
            'nit' => $request->NIT,
            'nama_lengkap' => strtoupper($request->fullName),
            'akademik_id' => $request->akademik
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa, Pembayaran $pembayaran)
    {
        // Load the akademik relationship and get master pembayaran via akademik
        $siswa->load('paymentsSummary');
        return view("siswa.show", compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $data = [
            'akademik' => Akademik::all(),
            'siswa' => $siswa
        ];
        // Go to view siswa.edit and send the data from model.
        return view("siswa.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        // Validate the request and update the siswa record
        $siswa->update([
            'nit' => $request->NIT,
            'nama_lengkap' => strtoupper($request->fullName),
            'akademik_id' => $request->akademik
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
    }

    // Function to get data for datatables
    public function data(Request $request)
    {
        $query = Siswa::with(['paymentsSummary', 'akademik']);

        // Filter Tahun Akademik
        if ($request->filled('tahun_akademik')) {
            $query->whereIn('akademik_id', $request->tahun_akademik);
        }

        // Filter Status Registrasi
        if ($request->filled('status_registrasi') && $request->status_registrasi !== 'all-filter-registrasi') {
            $status = $request->status_registrasi === 'filter-registrasi-lunas' ? 'Lunas' : 'Belum Lunas';
            $query->whereHas('paymentsSummary', function ($q) use ($status) {
                $q->where('status_registration', $status);
            });
        }

        // Filter Status SPI
        if ($request->filled('status_spi') && $request->status_spi !== 'all-filter-spi') {
            $status = $request->status_spi === 'filter-spi-lunas' ? 'Lunas' : 'Belum Lunas';
            $query->whereHas('paymentsSummary', function ($q) use ($status) {
                $q->where('status_spi', $status);
            });
        }

        $data = $query->orderBy('nit', 'desc')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tahun_akademik', function ($row) {
                return $row->akademik ? $row->akademik->tahun_akademik : '-';
            })
            ->editColumn('nit', fn($row) => '<h6 class="fw-bolder">' . $row->nit . '</h6>')
            ->editColumn('nama_lengkap', fn($row) => '<h6 class="fw-bolder">' . $row->nama_lengkap . '</h6>')
            ->editColumn('status_registrasi', function ($row) {
                return optional($row->paymentsSummary)->status_registration === 'Lunas'
                    ? '<span class="badge bg-success">Sudah Lunas</span>'
                    : '<span class="badge bg-danger">Belum Lunas</span>';
            })
            ->editColumn('status_spi', function ($row) {
                return optional($row->paymentsSummary)->status_spi === 'Lunas'
                    ? '<span class="badge bg-success">Sudah Lunas</span>'
                    : '<span class="badge bg-danger">Belum Lunas</span>';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('siswa.edit', $row->id);
                $showUrl = route('siswa.show', $row->id);
                $deleteUrl = route('siswa.destroy', $row->id);
                return '
            <div class="btn-group">
                <a href="' . $showUrl . '" class="btn btn-sm btn-primary"><i class="ti ti-eye fs-4"></i></a>
                <a href="' . $editUrl . '" class="btn btn-sm btn-success text-white"><i class="ti ti-pencil fs-4"></i></a>
                <button class="btn btn-sm btn-danger btn-delete" data-url="' . $deleteUrl . '"><i class="ti ti-trash fs-4"></i></button>
            </div>';
            })
            ->rawColumns(['nit', 'nama_lengkap', 'status_registrasi', 'status_spi', 'action'])
            ->make(true);
    }

    // Function to show import view
    public function import(Akademik $akademik)
    {
        $data = [
            'akademik' => $akademik->orderBy('tahun_akademik', 'desc')->get(),
        ];
        // Go to view siswa.import and send the data from model.
        return view("siswa.import", compact('data'));
    }

    // Function to send import data siswa to database
    public function importStore(Request $request, Siswa $siswa)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'akademik' => 'required|exists:akademik,id'
        ]);

        $file = $request->file('file');
        $data = Excel::toCollection(null, $file)[0];
        $siswaData = [];
        $duplicateNITs = [];
        $existingNITs = Siswa::pluck('nit')->toArray();

        foreach ($data as $index => $row) {
            // skip header
            if ($index < 3)
                continue;

            $nit = $row[0];
            if (in_array($nit, $existingNITs) || in_array($nit, array_column($siswaData, 'nit'))) {
                $duplicateNITs[] = $nit;
                continue;
            }

            $siswaData[] = [
                'nit' => $nit,
                'nama_lengkap' => strtoupper($row[1]),
                'akademik_id' => $request->akademik,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($siswaData as $row) {
            if (empty($row['nit']) || empty($row['nama_lengkap'])) {
                return redirect()->back()->withInput()->withErrors([
                    'file' => 'Import gagal. Pastikan format file sesuai dan kolom NIT serta Nama Lengkap tidak kosong.'
                ])->with('error', 'Format file tidak sesuai. Silakan periksa kembali file yang diupload.');
            }
        }

        if (!empty($duplicateNITs)) {
            return redirect()->back()->withInput()->withErrors([
                'file' => 'Import gagal. NIT berikut sudah ada: ' . implode(', ', $duplicateNITs)
            ])->with('error', 'Beberapa NIT sudah ada dalam database, silakan periksa kembali file yang diupload.');
        }

        // Insert the data into the siswa table
        $siswa->insert($siswaData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diimport!');
    }

    // Function to preview imported data siswa in datatable
    public function importPreview(Request $request)
    {
        $file = $request->file('file');

        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $data = Excel::toCollection(null, $file)[0];

        $rows = [];
        foreach ($data as $index => $row) {
            // skip header (first 3 rows)
            if ($index < 3)
                continue;

            $rows[] = [
                'nit' => $row[0],
                'nama_lengkap' => ucwords(strtolower($row[1])),
                'tahun_akademik' => $request->akademik,
            ];
        }

        return response()->json(['data' => $rows]);
    }

    // Function to show export view
    public function export(Akademik $akademik)
    {
        $data = [
            'akademik' => $akademik->orderBy('tahun_akademik', 'desc')->get(),
        ];
        // Go to view siswa.export and send the data from model.
        return view("siswa.export", compact('data'));
    }

    // Function to preview export data siswa in datatable
    public function exportPreview(Request $request)
    {
        $akademikId = $request->akademik;

        // Join through siswa table to get the correct data
        $siswa = PaymentsSummary::whereHas('siswa', function ($query) use ($akademikId) {
            $query->where('akademik_id', $akademikId);
        })
            ->orderBy('nit', 'asc')
            ->get();

        $rows = [];
        foreach ($siswa as $index => $row) {
            $rows[] = [
                'nit' => $row->nit,
                'nama_lengkap' => ucwords(strtolower($row->nama_lengkap)),
                'tahun_akademik' => $row->tahun_akademik,
            ];
        }

        return response()->json(['data' => $rows]);
    }

    // Function to export data siswa to excel
    public function exportDownload(Request $request)
    {
        $akademik_id = $request->akademik;
        $akademik = Akademik::findOrFail($akademik_id);

        $siswa = Siswa::with(['akademik', 'payments', 'paymentsSummary',])
            ->where('akademik_id', $akademik_id)
            ->orderBy('nit')
            ->get();

        $registrasi_fee = Pembayaran::where('akademik_id', $akademik_id)
            ->value('registration_fee') ?? 0;

        $spi_fee = Pembayaran::where('akademik_id', $akademik_id)
            ->value('spi_fee') ?? 0;

        return Excel::download(
            new SiswaExport($siswa, $akademik, $registrasi_fee, $spi_fee),
            'Export_Siswa_' . str_replace('/', '-', $akademik->tahun_akademik) . '.xlsx'
        );
    }

    // Function to show history transaction of registrasi siswa
    public function historyRegistrasi(Siswa $siswa)
    {
        // Load only payments with jenis_pembayaran 'Registrasi'
        $data = [
            'siswa_id' => $siswa->id,
            'siswa' => $siswa->load([
                'payments' => function ($query) {
                    $query->where('jenis_pembayaran', 'Registrasi');
                }
            ]),
        ];
        // dd($data);
        return view("siswa.transactions.registrasi", compact('data'));
    }

    // Function to show history transaction of spi siswa
    public function historySPI(Siswa $siswa)
    {
        // Load only payments with jenis_pembayaran 'Registrasi'
        $data = [
            'siswa_id' => $siswa->id,
            'siswa' => $siswa->load([
                'payments' => function ($query) {
                    $query->where('jenis_pembayaran', 'SPI');
                }
            ]),
        ];
        // dd($data);
        return view("siswa.transactions.spi", compact('data'));
    }
}
