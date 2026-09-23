<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficos</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/graficos.css') }}">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Por prioridade -->
    <script type="text/javascript">

        google.charts.load('current', {
            packages: ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            fetch('/graficos/prioridade')
                .then(response => response.json())
                .then(prioridades => {

                    var dados = [
                        ['Prioridade', 'Quantidade']
                    ];

                    for (var prioridade in prioridades) {

                        dados.push([
                            prioridade,
                            prioridades[prioridade]
                        ]);

                    }

                    var data = google.visualization.arrayToDataTable(dados);

                    var options = {
                        title: 'Tarefas por Prioridade',

                        pieHole: 0.4,
                        pieSliceText: 'value',

                        width: 450,
                        height: 300,

                        backgroundColor: 'transparent',

                        fontName: 'Nunito',
                        colors: ['#a174ee', '#4109a1', '#c74df7'],
                        titleTextStyle: {
                            color: '#3b82f6',
                            fontSize: 18,
                            bold: true
                        },

                        legend: {
                            position: 'bottom',
                            textStyle: {
                                color: 'white',
                                fontSize: 13,
                                
                            }
                        }
                    };

                    var chart = new google.visualization.PieChart(
                        document.getElementById('graficoPrioridade')
                    );

                    chart.draw(data, options);

                });

        }

    </script>

    <!-- Por Categoria -->
    <script type="text/javascript">

        google.charts.load('current', {
            packages: ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            fetch('/graficos/categoria')
                .then(response => response.json())
                .then(categorias => {

                    var dados = [
                        ['Categoria', 'Quantidade']
                    ];

                    for (var categoria in categorias) {

                        dados.push([
                            categoria,
                            categorias[categoria]
                        ]);

                    }

                    var data = google.visualization.arrayToDataTable(dados);

                    var options = {
                        title: 'Tarefas por Categorias',

                        pieSliceText: 'value',

                        width: 450,
                        height: 300,

                        backgroundColor: 'transparent',

                        fontName: 'Nunito',
                        colors: ['#748aee', '#120a7e', '#81b2fc', '#0e4980', '#559ec9'],
                        titleTextStyle: {
                            color: '#3b82f6',
                            fontSize: 18,
                            bold: true
                        },

                        legend: {
                            position: 'bottom',
                            textStyle: {
                                color: 'white',
                                fontSize: 13,
                                
                            }
                        }
                    };

                    var chart = new google.visualization.PieChart(
                        document.getElementById('graficoCategorias')
                    );

                    chart.draw(data, options);

                });

        }

    </script>

    <!-- Por status -->
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            fetch('/graficos/status')
                .then(response => response.json())
                .then(status => {

                    var dados = [
                        ['Status', 'Quantidade']
                    ];

                    for (var nomeStatus in status) {
                        dados.push([
                            nomeStatus,
                            status[nomeStatus]
                        ]);
                    }

                    var data = google.visualization.arrayToDataTable(dados);

                    var view = new google.visualization.DataView(data);

                    view.setColumns([
                        0,
                        1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        }
                    ]);

                    var options = {
                        title: 'Tarefas por Status',

                        width: 400,
                        height: 250,

                        backgroundColor: 'transparent',

                        colors: ['#ec4899', '#b8074b', '#ff8fe7'],

                        fontName: 'Nunito',

                        titleTextStyle: {
                            color: '#3b82f6',
                            fontSize: 18,
                            bold: true
                        },

                        bar: {
                            groupWidth: '40%'
                        },

                        legend: {
                            position: 'bottom',
                            textStyle: {
                                color: '#fdfdfd',
                                fontSize: 13
                            }
                        },

                        hAxis: {
                            textStyle: {
                                color: '#ffffff',
                                fontSize: 12
                            }
                        },

                        vAxis: {
                            textStyle: {
                                color: '#ffffff',
                                fontSize: 12
                            }
                        },
                    };

                    var chart = new google.visualization.ColumnChart(
                        document.getElementById('graficoStatus')
                    );

                    chart.draw(view, options);
                });
        }
    </script>

    <!-- grafico por datas -->
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            fetch('/graficos/data')
                .then(response => response.json())
                .then(datas => {

                    var dados = [
                        ['Data', 'Tarefas']
                    ];

                    for (var data in datas) {
                        dados.push([
                            data,
                            datas[data]
                        ]);
                    }

                    var chartData = google.visualization.arrayToDataTable(dados);

                    var options = {
                        title: 'Tarefas por Data',

                        width: 400,
                        height: 250,

                        backgroundColor: 'transparent',

                        colors: ['#2dbaf1'],

                        fontName: 'Nunito',

                        titleTextStyle: {
                            color: '#3b82f6',
                            fontSize: 18,
                            bold: true
                        },

                        hAxis: {
                            textStyle: {
                                color: '#ffffff',
                                fontSize: 12
                            }
                        },

                        vAxis: {
                            textStyle: {
                                color: '#ffffff',
                                fontSize: 12
                            }
                        },

                        lineWidth: 4,

                        curveType: 'function',

                        legend: {
                            position: 'none'
                        }
                    };

                    var chart = new google.visualization.LineChart(
                        document.getElementById('graficoData')
                    );

                    chart.draw(chartData, options);
                });
        }
    </script>


</head>
<body>

    <section class="viewPrincipal">
        <div class="secaoPrincipal">
            <x-menu />
            <div class="divPrincipal">

                <h1>Gráficos</h1>
                <div class="divGrafico">
                    <div class="grafico" id="graficoPrioridade"></div>
                    <div class="grafico" id="graficoCategorias"></div>
                    <div class="grafico" id="graficoStatus"></div>
                    <div class="grafico" id="graficoData"></div>
                    
                </div>
            </div>
        </div>
    </section>

    <script>
        lucide.createIcons();
    </script>
    
</body>
</html>