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
// Profit Start
// =====================================
// Inisialisasi array dari Juli (7) sampai Juni (6)
let urutanBulanAkademik = [7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6];
let spiData = Array(12).fill(0);
let registrasiData = Array(12).fill(0);

// Mapping data sesuai urutan bulan akademik
pemasukanBulanan.forEach(item => {
  let bulanAsli = item.bulan; // ex: 7, 1, dst
  let index = urutanBulanAkademik.indexOf(bulanAsli);
  if (index === -1) return;

  const total = parseInt(item.total);

  if (item.jenis_pembayaran === "SPI") {
    spiData[index] = total;
  } else if (item.jenis_pembayaran === "Registrasi") {
    registrasiData[index] = total;
  }
});


var profit = {
  series: [
    {
      name: "SPI",
      data: spiData,
    },
    {
      name: "Registrasi",
      data: registrasiData,
    },
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
      columnWidth: "27%",
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
    categories: ["Jul", "Aug", "Sep", "Okt", "Nov", "Des", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  legend: {
    show: false,
  },
  fill: {
    opacity: 1,
  },
  yaxis: {
    labels: {
      formatter: function (val) {
        return "Rp " + (val / 1000000).toLocaleString("id-ID", { maximumFractionDigits: 1 }) + " Jt";
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#profit"), profit);
chart.render();


// =====================================
// Profit End
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

