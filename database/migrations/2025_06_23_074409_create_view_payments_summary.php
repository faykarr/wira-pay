<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            'CREATE OR REPLACE VIEW payments_summary AS
            SELECT 
                siswa.id AS siswa_id,
                siswa.nit,
                siswa.nama_lengkap,
                akademik.tahun_akademik,
                master_pembayaran.registration_fee AS registration_fee,
                master_pembayaran.spi_fee AS spi_fee,

                COALESCE((
                    SELECT SUM(payments.nominal)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "Registrasi"
                ), 0) AS paid_registration,

                COALESCE((
                    SELECT COUNT(*)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "Registrasi"
                ), 0) AS angsuran_registration,

                COALESCE((
                    SELECT SUM(payments.nominal)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "SPI"
                ),0) AS paid_spi,

                COALESCE((
                    SELECT COUNT(*)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "SPI"
                ), 0) AS angsuran_spi,

                (master_pembayaran.registration_fee - COALESCE((
                    SELECT SUM(payments.nominal)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "Registrasi"
                ),0)) AS remaining_registration,

                (master_pembayaran.spi_fee - COALESCE((
                    SELECT SUM(payments.nominal)
                    FROM payments
                    WHERE payments.siswa_id = siswa.id
                    AND payments.jenis_pembayaran = "SPI"
                ),0)) AS remaining_spi,

                CASE
                    WHEN master_pembayaran.registration_fee = 0 THEN "Belum Lunas"
                    WHEN COALESCE((
                        SELECT SUM(payments.nominal)
                        FROM payments
                        WHERE payments.siswa_id = siswa.id
                        AND payments.jenis_pembayaran = "Registrasi"
                    ), 0) != master_pembayaran.registration_fee 
                    THEN "Belum Lunas"
                    ELSE "Lunas"
                END AS status_registration,

                CASE
                    WHEN master_pembayaran.spi_fee = 0 THEN "Belum Lunas"
                    WHEN COALESCE((
                        SELECT SUM(payments.nominal)
                        FROM payments
                        WHERE payments.siswa_id = siswa.id
                        AND payments.jenis_pembayaran = "SPI"
                    ), 0) != master_pembayaran.spi_fee 
                    THEN "Belum Lunas"
                    ELSE "Lunas"
                END AS status_spi,
                
                CASE 
                    WHEN master_pembayaran.registration_fee = 0 THEN 0
                    ELSE 
                        COALESCE((
                            SELECT SUM(payments.nominal)
                            FROM payments
                            WHERE payments.siswa_id = siswa.id
                            AND payments.jenis_pembayaran = "Registrasi"
                        ), 0) / master_pembayaran.registration_fee * 100
                END AS progress_registration,

                CASE 
                    WHEN master_pembayaran.spi_fee = 0 THEN 0
                    ELSE 
                        COALESCE((
                            SELECT SUM(payments.nominal)
                            FROM payments
                            WHERE payments.siswa_id = siswa.id
                            AND payments.jenis_pembayaran = "SPI"
                        ), 0) / master_pembayaran.spi_fee * 100
                END AS progress_spi

            FROM siswa
            JOIN akademik ON akademik.id = siswa.akademik_id
            JOIN master_pembayaran ON master_pembayaran.akademik_id = akademik.id'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::raw('DROP VIEW IF EXISTS view_payments_summary');
    }
};
