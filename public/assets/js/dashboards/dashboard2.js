// =====================================
// Format Rupiah Singkat
// =====================================
function formatRupiahSingkat(angka) {
  angka = Number(angka) || 0;
  if (isNaN(angka)) return 0;
  if (angka >= 1_000_000_000) {
    return 'Rp ' + (angka / 1_000_000_000).toFixed(1).replace('.', ',') + 'M';
  } else if (angka >= 1_000_000) {
    return 'Rp ' + (angka / 1_000_000).toFixed(1).replace('.', ',') + 'jt';
  } else if (angka >= 1_000) {
    return 'Rp ' + Math.floor(angka / 1_000) + 'rb';
  }
  return angka.toLocaleString('id-ID');
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.rupiah-singkat').forEach(function (el) {
    el.textContent = formatRupiahSingkat(el.dataset.value);
  });
});


// =====================================
// Profit Start - Grafik Semester
// =====================================
// Persiapan data untuk grafik semester dari data historis
let periodeLabels = [];
let spiValues = [];
let registrasiValues = [];

// Ambil data dari variable global pemasukanSemesterHistoris
if (typeof pemasukanSemesterHistoris !== 'undefined' && pemasukanSemesterHistoris.length > 0) {
  pemasukanSemesterHistoris.forEach(item => {
    periodeLabels.push(item.period);
    spiValues.push(item.spi);
    registrasiValues.push(item.registrasi);
  });
} else {
  // Fallback jika tidak ada data
  periodeLabels = ['Jul-Des 2019', 'Jan-Jun 2020', 'Jul-Des 2020', 'Jan-Jun 2021', 'Jul-Des 2021', 'Jan-Jun 2022'];
  spiValues = Array(6).fill(0);
  registrasiValues = Array(6).fill(0);
}

var profit = {
  series: [
    {
      name: "SPI",
      data: spiValues,
    },
    {
      name: "Registrasi", 
      data: registrasiValues,
    }
  ],
  colors: ["var(--bs-primary)", "#fb977d"],
  chart: {
    type: "bar",
    fontFamily: "inherit",
    foreColor: "#adb0bb",
    width: "100%",
    height: 300,
    stacked: true,
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "45%",
      borderRadius: 6,
    },
  },
  dataLabels: {
    enabled: false,
  },
  grid: {
    borderColor: "var(--bs-border-color)",
    padding: { top: 0, bottom: -8, left: 20, right: 20 },
  },
  tooltip: {
    theme: "dark",
    y: {
      formatter: function (val) {
        return "Rp " + val.toLocaleString("id-ID");
      },
    },
  },
  xaxis: {
    categories: periodeLabels,
    axisBorder: { show: false },
    axisTicks: { show: false },
    labels: {
      rotate: -45,
      style: {
        fontSize: '10px'
      }
    }
  },
  legend: {
    show: true,
    position: 'top',
    horizontalAlign: 'left',
    offsetY: -10
  },
  fill: {
    opacity: 1,
  },
  yaxis: {
    labels: {
      formatter: function (val) {
        if (val >= 1000000) {
          return "Rp " + (val / 1000000).toLocaleString("id-ID", { maximumFractionDigits: 1 }) + " Jt";
        } else if (val >= 1000) {
          return "Rp " + (val / 1000).toLocaleString("id-ID", { maximumFractionDigits: 0 }) + " rb";
        }
        return "Rp " + val.toLocaleString("id-ID");
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#profit"), profit);
chart.render();


// =====================================
// Profit End - Grafik Semester
// =====================================

// =====================================
// Test Start
// =====================================
// Inisialisasi
let categories = [];
let registrasiSeries = [];
let spiSeries = [];

pemasukanTahunan.forEach(group => {
  // group = array dengan item jenis_pembayaran dan total
  if (group.length > 0) {
    const tahunAkademik = group[0].tahun_akademik;
    categories.push(tahunAkademik);

    // Cari total per jenis pembayaran
    const registrasi = group.find(item => item.jenis_pembayaran === 'Registrasi');
    const spi = group.find(item => item.jenis_pembayaran === 'SPI');

    registrasiSeries.push(registrasi ? parseInt(registrasi.total) : 0);
    spiSeries.push(spi ? parseInt(spi.total) : 0);
  }
});

var test = {
  series: [
    {
      name: "Registrasi",
      data: registrasiSeries,
      color: "var(--bs-primary)",
    },
    {
      name: "SPI",
      data: spiSeries,
      color: "#fb977d",
    },
  ],
  chart: {
    height: 240,
    type: "area",
    fontFamily: "inherit",
    foreColor: "#626b81",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 4,
    strokeWidth: 1,
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
    },
  },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 0,
      inverseColors: false,
      opacityFrom: 0.2,
      opacityTo: 0,
      stops: [20, 180],
    },
  },
  stroke: {
    curve: "smooth",
    width: "2",
  },
  xaxis: {
    categories: categories,
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: {
    labels: { show: false },
  },
  tooltip: {
    theme: "dark",
    y: {
      formatter: function (val) {
        return "Rp " + val.toLocaleString("id-ID");
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#test"), test);
chart.render();
// =====================================
// Test End
// =====================================

// =====================================
// Grade End
// =====================================
var grade = {
  series: [
    parseFloat(persentaseSiswa.belum_lunas),
    parseFloat(persentaseSiswa.lunas)
  ],
  labels: ["Belum Lunas", "Sudah Lunas"],
  chart: {
    height: 250,
    type: "donut",
    fontFamily: "inherit",
    foreColor: "#c6d1e9",
    offsetX: -15,
  },
  tooltip: {
    theme: "dark",
    fillSeriesColor: false,
  },
  colors: ["#fb977d", "var(--bs-primary)"],
  dataLabels: {
    enabled: true,
    formatter: function (val, opts) {
      return val.toFixed(2) + "%";
    }
  },
  grid: {
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
    },
  },
  legend: {
    show: false,
  },
  stroke: {
    show: false,
  },
  plotOptions: {
    pie: {
      donut: {
        size: "75%",
        background: "none",
        labels: {
          show: true,
          name: {
            show: true,
            fontSize: "18px",
            offsetY: 5,
          },
          value: {
            show: false,
          },
        },
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#grade"), grade);
chart.render();

