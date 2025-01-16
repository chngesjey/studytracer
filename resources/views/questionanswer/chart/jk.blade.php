<canvas id="jk"></canvas>
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
        var url = "{{ route('chart.jk') }}"
        if (periode != null) {
            url += `?periode=${periode}`
        }
        $.ajax({
            url: url,
            type: "GET",
            success: function(res) {
                const ctx = document.getElementById('jk');
                const data = {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        label: 'Alumni',
                        data: [res.lk, res.pr],
                        backgroundColor: [
                            '#FF0080',
                            '#7469B6',
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
                                text: 'Grafik Responden Berdasarkan Jenis Kelamin'
                            }
                        }
                    },
                };
                new Chart(ctx, config);
            }
        })
    </script>
@endpush
