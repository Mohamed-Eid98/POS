function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        var t = document.getElementById(e).getAttribute("data-colors");
        if (t) return (t = JSON.parse(t)).map(function (e) {
            var t = e.replace(" ", "");
            if (-1 === t.indexOf(",")) {
                var r = getComputedStyle(document.documentElement).getPropertyValue(t);
                return r || t
            }
            var o = e.split(",");
            return 2 != o.length ? t : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(o[0]) + "," + o[1] + ")"
        });
        console.warn("data-colors Attribute not found on:", e)
    }
}
var lineChartDatalabelColors = getChartColorsArray("line_chart_datalabel");
lineChartDatalabelColors && (options = {
    chart: {
        height: 380,
        type: "line",
        zoom: {
            enabled: !1
        },
        toolbar: {
            show: !1
        }
    },
    colors: lineChartDatalabelColors,
    dataLabels: {
        enabled: !1
    },
    stroke: {
        width: [3, 3],
        curve: "straight"
    },
    series: [{
        name: "High - 2018",
        data: [26, 24, 32, 36, 33, 31, 33]
    }, {
        name: "Low - 2018",
        data: [14, 11, 16, 12, 17, 13, 12]
    }],
    title: {
        text: "Average High & Low Temperature",
        align: "left",
        style: {
            fontWeight: "500"
        }
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f1f1"
    },
    markers: {
        style: "inverted",
        size: 6
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        title: {
            text: "Month"
        }
    },
    yaxis: {
        title: {
            text: "Temperature"
        },
        min: 5,
        max: 40
    },
    legend: {
        position: "top",
        horizontalAlign: "right",
        floating: !0,
        offsetY: -25,
        offsetX: -5
    },
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                toolbar: {
                    show: !1
                }
            },
            legend: {
                show: !1
            }
        }
    }]
}, (chart = new ApexCharts(document.querySelector("#column_chart"), options)).render());
var columnChartDatalabelColors = getChartColorsArray("column_chart_datalabel");
columnChartDatalabelColors && (options = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            dataLabels: {
                position: "top"
            }
        }
    },
    dataLabels: {
        enabled: !0,
        formatter: function (e) {
            return e + "%"
        },
        offsetY: -22,
        style: {
            fontSize: "12px",
            colors: ["#304758"]
        }
    },
    series: [{
        name: "Inflation",
        data: [2.5, 3.2, 5, 10.1, 4.2, 3.8, 3, 2.4, 4, 1.2, 3.5, .8]
    }],
    colors: columnChartDatalabelColors,
    grid: {
        borderColor: "#f1f1f1"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: "top",
        labels: {
            offsetY: -18
        },
        axisBorder: {
            show: !1
        },
        axisTicks: {
            show: !1
        },
        crosshairs: {
            fill: {
                type: "gradient",
                gradient: {
                    colorFrom: "#D8E3F0",
                    colorTo: "#BED1E6",
                    stops: [0, 100],
                    opacityFrom: .4,
                    opacityTo: .5
                }
            }
        },
        tooltip: {
            enabled: !0,
            offsetY: -35
        }
    },
    fill: {
        gradient: {
            shade: "light",
            type: "horizontal",
            shadeIntensity: .25,
            gradientToColors: void 0,
            inverseColors: !0,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        }
    },
    yaxis: {
        axisBorder: {
            show: !1
        },
        axisTicks: {
            show: !1
        },
        labels: {
            show: !1,
            formatter: function (e) {
                return e + "%"
            }
        }
    },
    title: {
        text: "Monthly Inflation in Argentina, 2002",
        floating: !0,
        offsetY: 330,
        align: "center",
        style: {
            color: "#444",
            fontWeight: "500"
        }
    }
}, (chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options)).render());
var barChartColors = getChartColorsArray("bar_chart");
barChartColors && (options = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !0
        }
    },
    dataLabels: {
        enabled: !1
    },
    series: [{
        data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365]
    }],
    colors: barChartColors,
    grid: {
        borderColor: "#f1f1f1"
    },
    xaxis: {
        categories: ["South Korea", "Canada", "United Kingdom", "Netherlands", "Italy", "France", "Japan", "United States", "China", "Germany"]
    }
});
