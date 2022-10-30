var my_date_format = function (input) {
    var d = new Date(input);
    var month = [
        "January",
        "Februari",
        "Maret",
        "April",
        "May",
        "Juni",
        "Juli",
        "Augustus",
        "September",
        "October",
        "November",
        "December",
    ];
    var date =
        d.getDate().toString() +
        " " +
        month[d.getMonth().toString()] +
        ", " +
        d.getFullYear() +" "+
        d.getHours()+":"+
        d.getMinutes()+":"+
        d.getSeconds();
    //    console.log(d.getDate());
    return date;
};

var myChart = document.getElementById("myChart").getContext("2d");
var chart = new Chart(myChart, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            {
                label: "Suhu",
                backgroundColor: "rgb(200, 116, 101)",
                borderColor: "rgb(200, 116, 101)",
                data: [],
            },
            {
                label: "Kalman Suhu",
                backgroundColor: "rgb(252, 0, 0)",
                borderColor: "rgb(252, 0, 0)",
                data: [],
            },
        ],
    },
    options: {},
});


var myChart2 = document.getElementById("myChart2").getContext("2d");
var chart2 = new Chart(myChart2, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            {
                label: "pH",
                backgroundColor: "rgb(0, 0, 255)",
                borderColor: "rgb(0, 0, 255)",
                data: [],
            },
            {
                label: "Kalman pH",
                backgroundColor: "rgb(0, 0, 100)",
                borderColor: "rgb(0, 0, 100)",
                data: [],
            },
        ],
    },
    options: {},
});

// const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 50};
var myChart3 = document.getElementById("myChart3").getContext("2d");
var chart3 = new Chart(myChart3, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            {
                label: "Salinitas",
                backgroundColor: "rgb(0, 204, 0)",
                borderColor: "rgb(0, 204, 0)",
                data: [],
            },
            {
                label: "Kalaman Salinitas",
                backgroundColor: "rgb(0, 100 , 0)",
                borderColor: "rgb(0, 100, 0)",
                data: [],
            },
        ],
    },
    options: {},
});


var updateChart = function () {
    $("#myChart").html("");
    $("#myChart").html(
        '<canvas id="myChart" width="500" height="400"></canvas>'
    );
    $("#myChart2").html("");
    $("#myChart2").html(
        '<canvas id="myChart2" width="500" height="400"></canvas>'
    );
    $("#myChart3").html(
        '<canvas id="myChart3" width="500" height="400"></canvas>'
    );

    $.ajax({
        url: "datasensor",
        method: "GET",
    
        success: function (data) {
            console.log(data);
            chart.data.labels = [];
            chart.data.datasets[0].data = [];
            chart.data.datasets[1].data = [];
            chart2.data.labels = [];
            chart2.data.datasets[0].data = [];
            chart2.data.datasets[1].data = [];
            chart3.data.labels = [];
            chart3.data.datasets[0].data = [];
            chart3.data.datasets[1].data = [];

            for (var i in data) {
                chart.data.labels.push(my_date_format(data[i].tanggal));
                chart.data.datasets[0].data.push(data[i].suhu);
                chart.data.datasets[1].data.push(data[i].kalmanSuhu);
                chart2.data.labels.push(my_date_format(data[i].tanggal));
                chart2.data.datasets[0].data.push(data[i].ph);
                chart2.data.datasets[1].data.push(data[i].kalmanPh);
                chart3.data.labels.push(my_date_format(data[i].tanggal));
                chart3.data.datasets[0].data.push(data[i].salinitas);
                chart3.data.datasets[1].data.push(data[i].kalmanSalinitas);
            }

            chart.update();
            chart2.update();
            chart3.update();
        },error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('error', errorThrown);
        }
    });
};





updateChart();

setInterval(() => {
    updateChart();
   
}, 3000);
