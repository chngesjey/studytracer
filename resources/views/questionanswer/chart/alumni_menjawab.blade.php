<canvas id="chart"></canvas>
@push('js')
    <script>
        function getParameterByName(name) {
            var url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        var periode = getParameterByName('periode')
        $.ajax({
            url: "{{ route('chart.alumni') }}" + `?periode=${periode}`,
            type: "GET",
            success: function(res) {
                const ctx = document.getElementById('chart');
                const data = {
                    labels: ['Suda Mengisi', 'Belum Mengisi'],
                    datasets: [{
                        label: 'Alumni',
                        data: res.datasets,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                        ],
                        hoverOffset: 4
                    }]
                }
                const config = {
                    type: 'doughnut',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Grafik Responden Berdasarkan Alumni'
                            }
                        }
                    },
                };
                new Chart(ctx, config);
            }
        })
    </script>
@endpush
