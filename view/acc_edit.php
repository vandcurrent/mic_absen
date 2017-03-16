 <!-- Content -->
<div class="grid fluid container">
    <div class="row">
        <div class="span12">
            <h1>
                <a href="./"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                Manajemen<small class="on-right">Akun</small>
            </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <h3>Under Construction.</h3>
        </div>
    </div>
    <hr>
    <script>
        var tgl = <?php echo '["' . implode('","', $tgl) . '"]' ?>;
        var jm = <?php echo '["' . implode('","', $jm) . '"]' ?>;
        var jk = <?php echo '["' . implode('","', $jk) . '"]' ?>;
        var lineChartData = {
            labels : tgl,
            datasets : [
                {
                    label: "Jam Masuk",
                    fillColor : "rgba(135,211,124,0.2)",
                    strokeColor : "rgba(135,211,124,1)",
                    pointColor : "rgba(135,211,124,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(135,211,124,1)",
                    data : jm
                },
                {
                    label: "Jam Keluar",
                    fillColor : "rgba(241,169,160,0.2)",
                    strokeColor : "rgba(241,169,160,1)",
                    pointColor : "rgba(241,169,160,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(241,169,160,1)",
                    data : jk
                }
            ]
        }

    window.onload = function(){
        var steps = 6;
        var max = 24;
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true,
            scaleOverride: true,
            scaleSteps: steps,
            scaleStepWidth: Math.ceil(max / steps),
            scaleStartValue: 0
        });
        legend(document.getElementById("lineLegend"), lineChartData);
    }
    </script>