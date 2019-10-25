// chart
// visitor
var ctx = document.getElementById('visitorChart');
ctx.height = 235;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# of Votes',
            fill: false,
            smooth: false,
            lineTension: 0,
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {	
	    legend: {
	        display: false
	    },
        scales: {
            yAxes: [{
                ticks: {
                	min: 0,
                    beginAtZero: true,
                    stepSize: 5,
                }
            }]
        }
    }
});

// usert
var ctx = document.getElementById('userChart');
ctx.height = 200;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# of Votes',
            fill: false,
            smooth: false,
            lineTension: 0,
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
    	legend: {
    		display: false
    	},
        scales: {
            yAxes: [{
                ticks: {
                	min: 0,
                    beginAtZero: true,
                    stepSize: 5,
                }
            }]
        }
    }
});

// tournament
var ctx = document.getElementById('tournamentChart');
ctx.height = 200;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# of Votes',
            fill: false,
            smooth: false,
            lineTension: 0,
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
    	legend: {
    		display: false
    	},
        scales: {
            yAxes: [{
                ticks: {
                	min: 0,
                    beginAtZero: true,
                    stepSize: 5,
                }
            }]
        }
    }
});