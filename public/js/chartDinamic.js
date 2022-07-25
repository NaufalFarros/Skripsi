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
        d.getFullYear().toString();
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
                backgroundColor: "rgb(252, 116, 101)",
                borderColor: "rgb(252, 116, 101)",
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




    $.ajax({
        url: "datasensor",
        method: "GET",
    
        success: function (data) {
            console.log(data);
            chart.data.labels = [];
            chart.data.datasets[0].data = [];
            chart2.data.labels = [];
            chart2.data.datasets[0].data = [];

            for (var i in data) {
                chart.data.labels.push(my_date_format(data[i].created_at));
                chart.data.datasets[0].data.push(data[i].suhu);
                chart2.data.labels.push(my_date_format(data[i].created_at));
                chart2.data.datasets[0].data.push(data[i].ph);
            }

            chart.update();
            chart2.update();
        },error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('error', errorThrown);
        }
    });
};





updateChart();

setInterval(() => {
    updateChart();
   
}, 3000);
