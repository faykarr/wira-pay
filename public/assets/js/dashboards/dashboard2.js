// =====================================
// Profit Start
// =====================================
var profit = {
  series: [
    {
      name: "SPI",
      data: [1000000, 1200000, 800000, 500000, 1000000, 900000, 1500000, 1200000, 1800000, 2000000, 1700000, 2500000],
    },
    {
      name: "Registrasi",
      data: [2700000, 2500000, 1500000, 700000, 1700000, 1400000, 2800000, 2500000, 3000000, 3200000, 2800000, 3500000],
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
      show: !1,
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
  toolbar: {
    show: false,
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
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
        // Show in millions with "Jt" suffix
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

// Generate last 5 years including current year
var currentYear = new Date().getFullYear();
var categories = [];
for (var i = 4; i >= 0; i--) {
  categories.push((currentYear - i).toString());
}

var test = {
  series: [
    {
      color: "var(--bs-primary)",
      name: "Total",
      data: [87000000, 15000000, 90000000, 170000000, 160000000],
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
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    labels: {
      show: false
    }
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
  series: [100, 150],
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
            color: undefined,
            offsetY: 5,
          },
          value: {
            show: false,
            color: "#98aab4",
          },
        },
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#grade"), grade);
chart.render();
