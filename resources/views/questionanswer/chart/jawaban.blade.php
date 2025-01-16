<div id="charts-container"></div>
@push('css')
    <style>
        #charts-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .chart-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .chart-wrapper h2 {
            text-align: center;
        }
    </style>
@endpush
@push('js')
    <script>
        var url = "{{ route('chart.jawaban') }}"
        if (periode != null) {
            url += `?periode=${periode}`
        }
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                response.forEach((data, index) => {
                    var canvasId = 'chart-' + index;
                    var chartWrapper = $('<div class="chart-wrapper"><h6>' + data.question +
                        '</h6><canvas id="' + canvasId + '"></canvas></div>');
                    $('#charts-container').append(chartWrapper);

                    var ctx = document.getElementById(canvasId).getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.answers.map(answer => answer.jawaban),
                            datasets: [{
                                label: 'Alumni yang menjawab',
                                data: data.answers.map(answer => answer.count),
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            }
        });
    </script>
@endpush
