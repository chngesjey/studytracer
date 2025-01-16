<canvas id="umur"></canvas>
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
        var url = "{{ route('chart.umur') }}"
        if (periode != null) {
            url += `?periode=${periode}`
        }
        $.ajax({
            url: url,
            type: "GET",
            success: function(res) {
                const ctx = document.getElementById('umur');
                const data = {
                    labels: ['Remaja (15-24 tahun)', 'Dewasa (25-44 tahun)'],
                    datasets: [{
                        label: 'Alumni',
                        data: [res.remaja, res.dewasa],
                        backgroundColor: [
                            '#FFAF61',
                            '#03AED2',
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
                                text: 'Grafik Responden Berdasarkan Umur'
                            }
                        }
                    },
                };
                new Chart(ctx, config);
            }
        })
    </script>
@endpush
