var chartColors = {
    red: "rgb(255, 99, 132)",
    orange: "rgb(255, 159, 64)",
    yellow: "rgb(255, 205, 86)",
    green: "rgb(75, 192, 192)",
    info: "#41B1F9",
    blue: "#3245D1",
    purple: "rgb(153, 102, 255)",
    grey: "#EBEFF6",
  }

var optionsProfileVisit = {
  annotations: {
    position: "back",
  },
  dataLabels: {
    enabled: false,
  },
  chart: {
    type: "bar",
    height: 300,
  },
  fill: {
    opacity: 1,
  },
  plotOptions: {},
  series: [
    {
      name: "sales",
      data: "test"
    },
  ],
  colors: "#435ebe",
  xaxis: {
    categories: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
  },
}

var optionsEurope = {
  series: [
    {
      name: "series1",
      data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
    },
  ],
  chart: {
    height: 80,
    type: "area",
    toolbar: {
      show: false,
    },
  },
  colors: ["#5350e9"],
  stroke: {
    width: 2,
  },
  grid: {
    show: false,
  },
  dataLabels: {
    enabled: false,
  },
  xaxis: {
    type: "datetime",
    categories: [
      "2018-09-19T00:00:00.000Z",
      "2018-09-19T01:30:00.000Z",
      "2018-09-19T02:30:00.000Z",
      "2018-09-19T03:30:00.000Z",
      "2018-09-19T04:30:00.000Z",
      "2018-09-19T05:30:00.000Z",
      "2018-09-19T06:30:00.000Z",
      "2018-09-19T07:30:00.000Z",
      "2018-09-19T08:30:00.000Z",
      "2018-09-19T09:30:00.000Z",
      "2018-09-19T10:30:00.000Z",
      "2018-09-19T11:30:00.000Z",
    ],
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
    labels: {
      show: false,
    },
  },
  show: false,
  yaxis: {
    labels: {
      show: false,
    },
  },
  tooltip: {
    x: {
      format: "dd/MM/yy HH:mm",
    },
  },
}


// var ctxBar = document.getElementById("barChartCanvas").getContext("2d")
// var myBar = new Chart(ctxBar, {
//   type: "bar",
//   data: {
//     labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
//     datasets: [
//       {
//         label: "Students",
//         backgroundColor: [
//           chartColors.grey,
//           chartColors.grey,
//           chartColors.grey,
//           chartColors.grey,
//           chartColors.info,
//           chartColors.blue,
//           chartColors.grey,
//         ],
//         data: [5, 10, 30, 40, 35, 55, 15],
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//     barRoundness: 1,
//     title: {
//       display: true,
//       text: "Students in 2020",
//     },
//     legend: {
//       display: false,
//     },
//     scales: {
//       yAxes: [
//         {
//           ticks: {
//             beginAtZero: true,
//             suggestedMax: 40 + 20,
//             padding: 10,
//           },
//           gridLines: {
//             drawBorder: false,
//           },
//         },
//       ],
//       xAxes: [
//         {
//           gridLines: {
//             display: false,
//             drawBorder: false,
//           },
//         },
//       ],
//     },
//   },
// })

let optionsAmerica = {
  ...optionsEurope,
  colors: ["#008b75"],
}
let optionsIndonesia = {
  ...optionsEurope,
  colors: ["#dc3545"],
}

var chartProfileVisit = new ApexCharts(
    document.querySelector("#chart-profile-visit"),
    optionsProfileVisit
  );

chartProfileVisit.render();

// var chartVisitorsProfile = new ApexCharts(
//   document.getElementById("chart-visitors-profile"),
//   optionsVisitorsProfile
// )
var chartEurope = new ApexCharts(
  document.querySelector("#chart-europe"),
  optionsEurope
)
var chartAmerica = new ApexCharts(
  document.querySelector("#chart-america"),
  optionsAmerica
)
var chartIndonesia = new ApexCharts(
  document.querySelector("#chart-indonesia"),
  optionsIndonesia
)

chartIndonesia.render()
chartAmerica.render()
chartEurope.render()
chartProfileVisit.render()
// chartVisitorsProfile.render()
