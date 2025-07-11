<table>
    <thead>
        <tr>
            <th colspan="{{ 3 + $maxAngsuranRegistrasi + 8 }}"
                style="font-size: 12pt; font-weight: bolder; text-align: center;">REGISTRASI SISWA BARU TA
                {{ $akademik->tahun_akademik }}
            </th>
        </tr>
        <tr>
            <th colspan="{{ 3 + $maxAngsuranRegistrasi + 8 }}"
                style="font-size: 12pt; font-weight: bolder; text-align: center;">SMK WIRA BAHARI</th>
        </tr>
        <tr>
            <th colspan="{{ 3 + $maxAngsuranRegistrasi + 4 }}" style="text-align: left;">
                Diexport pada : {{ now()->format('d-M-Y H:i:s') }}
            </th>
            <th bgcolor="#FFFF00" style="text-align: left;">REGISTRASI :</th>
            <th bgcolor="#FFFF00" style="text-align: right;">
                Rp {{ number_format($registrasi_fee, 0, ',', '.') }}
            </th>
            <th bgcolor="#FFFF00" style="text-align: left;">SPI : </th>
            <th bgcolor="#FFFF00" style="text-align: right;">
                Rp {{ number_format($spi_fee, 0, ',', '.') }}
            </th>
        </tr>
        <tr>
            <th rowspan="2" style="text-align: center;">No</th>
            <th rowspan="2" style="text-align: center;">NIT</th>
            <th rowspan="2" style="text-align: center;">NAMA</th>
            <th colspan="{{ $maxAngsuranRegistrasi + 1 }}" style="text-align: center;">ANGSURAN Ke - </th>
            <th colspan="5" style="text-align: center;">SPI SEMESTER</th>
            <th rowspan="2" style="word-wrap: break-word; text-align: center;">KURANG REGISTRASI</th>
            <th rowspan="2" style="word-wrap: break-word; text-align: center;">KURANG SPI</th>
        </tr>
        <tr>
            @for ($angsuran = 1; $angsuran <= $maxAngsuranRegistrasi; $angsuran++)
                <th style="text-align: center;">{{ $angsuran }}</th>
            @endfor
            <th style="text-align: center;">JML REG.</th>
            @php
                if (!function_exists('roman_numeral')) {
                    function roman_numeral($number)
                    {
                        $map = [
                            'M' => 1000,
                            'CM' => 900,
                            'D' => 500,
                            'CD' => 400,
                            'C' => 100,
                            'XC' => 90,
                            'L' => 50,
                            'XL' => 40,
                            'X' => 10,
                            'IX' => 9,
                            'V' => 5,
                            'IV' => 4,
                            'I' => 1
                        ];
                        $returnValue = '';
                        while ($number > 0) {
                            foreach ($map as $roman => $int) {
                                if ($number >= $int) {
                                    $number -= $int;
                                    $returnValue .= $roman;
                                    break;
                                }
                            }
                        }
                        return $returnValue;
                    }
                }
            @endphp
            @for ($spi = 1; $spi <= $maxAngsuranSPI; $spi++)
                <th style="text-align: center;">
                    {{ \Illuminate\Support\Str::upper(roman_numeral($spi)) }}
                </th>
            @endfor
            <th style="text-align: center;">JML SPI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $index => $row)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="text-align: center;">{{ $row->nit }}</td>
                <td style="text-align: left;">{{ $row->nama_lengkap }}</td>

                {{-- Angsuran Registrasi --}}
                @for ($angsuran = 1; $angsuran <= $maxAngsuranRegistrasi; $angsuran++)
                    @php
                        $pembayaranReg = $row->payments->where('jenis_pembayaran', 'Registrasi')->where('angsuran', $angsuran)->first();
                        $nominalReg = optional($pembayaranReg)->nominal ?? 0;
                    @endphp
                    <td style="text-align: right; background-color: #FFF2CC;" data-format="Rp #,##0">
                        {{ $nominalReg > 0 ? $nominalReg : '' }}
                    </td>
                @endfor

                {{-- Jumlah Registrasi --}}
                @php
                    $style = $row->paymentsSummary->status_registration == 'Lunas'
                        ? 'background-color: #D6D85D;'
                        : '';
                @endphp
                <td style="text-align: right; {{ $style }}" data-format="Rp #,##0">
                    {{ $row->paymentsSummary->paid_registration > 0 ? $row->paymentsSummary->paid_registration : '' }}
                </td>

                {{-- Angsuran SPI --}}
                @for ($semester = 1; $semester <= 4; $semester++)
                    @php
                        $pembayaranSpi = $row->payments->where('jenis_pembayaran', 'SPI')->where('angsuran', $semester)->first();
                        $nominalSpi = optional($pembayaranSpi)->nominal ?? 0;
                    @endphp
                    <td style="text-align: right; background-color: #D9E1F2;" data-format="Rp #,##0">
                        {{ $nominalSpi > 0 ? $nominalSpi : '' }}
                    </td>
                @endfor

                {{-- Jumlah SPI --}}
                @php
                    $style = $row->paymentsSummary->status_spi == 'Lunas'
                        ? 'background-color: #A4DD00;'
                        : '';
                @endphp
                <td style="text-align: right; {{ $style }}" data-format="Rp #,##0">
                    {{ $row->paymentsSummary->paid_spi > 0 ? $row->paymentsSummary->paid_spi : '' }}
                </td>

                {{-- Kurang Registrasi --}}
                @php
                    $style = $row->paymentsSummary->status_registration == 'Lunas'
                        ? 'background-color: #D6D85D;'
                        : '';

                    // Check if Lunas then show LUNAS REG.
                    $data = $row->paymentsSummary->status_registration == 'Lunas'
                        ? 'LUNAS REG'
                        : $row->paymentsSummary->remaining_registration;
                @endphp
                <td style="text-align: right; {{ $style }}" data-format="Rp #,##0">
                    {{ $data }}
                </td>

                {{-- Kurang SPI --}}
                @php
                    $style = $row->paymentsSummary->status_spi == 'Lunas'
                        ? 'background-color: #A4DD00;'
                        : '';

                    // Check if Lunas then show LUNAS SPI.
                    $data = $row->paymentsSummary->status_spi == 'Lunas'
                        ? 'LUNAS SPI'
                        : $row->paymentsSummary->remaining_spi;
                @endphp
                <td style="text-align: right; {{ $style }}" data-format="Rp #,##0">
                    {{ $data }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="{{ 3 + $maxAngsuranRegistrasi }}"
                style="text-align: center; font-weight: bold; background-color: #D9E1F2;">
                TOTAL REGISTRASI
            </td>
            <td style="text-align: right; font-weight: bold; background-color: #D9E1F2;"
                data-format="[$Rp-421]* #,##0_ ;[Red]\-[$Rp-421]* #,##0_ ">
                {{$siswa->sum('paymentsSummary.paid_registration') }}
            </td>
            <td colspan="{{ $maxAngsuranSPI }}"
                style="text-align: center; font-weight: bold; background-color: #C6E0B4;">
                TOTAL SPI
            </td>
            <td style="text-align: right; font-weight: bold; background-color: #C6E0B4;"
                data-format="[$Rp-421]* #,##0_ ;[Red]\-[$Rp-421]* #,##0_ ">
                {{$siswa->sum('paymentsSummary.paid_spi') }}
            </td>
            <td colspan="2" style="text-align: center; font-weight: bold; background-color: #C6E0B4;">
            </td>
        </tr>
    </tbody>
</table>