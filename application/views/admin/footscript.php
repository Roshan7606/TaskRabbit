<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/custom.js" type="text/javascript"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>admin_assets/js/main.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/pace.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery.nanoscroller.min.js"></script>

<script src="<?php echo base_url(); ?>admin_assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery-jvectormap-1.2.2.min.js"></script>

<script src="<?php echo base_url(); ?>admin_assets/js/waves.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery-jvectormap-world-mill-en.js"></script>
<!--        <script src="<?php echo base_url(); ?>admin_assets/js/jquery.nanoscroller.min.js"></script>-->

<!-- Google Analytics:  -->
<script src="<?php echo base_url(); ?>admin_assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/pace.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/waves.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/morris_chart/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/morris_chart/morris.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery-jvectormap-world-mill-en.js"></script>
<!--        <script src="<?php echo base_url(); ?>admin_assets/js/jquery.nanoscroller.min.js"></script>-->

<script src="<?php echo base_url(); ?>admin_assets/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/data-tables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/data-tables/dataTables.tableTools.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/data-tables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/data-tables/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/waves.min.js"></script>
<!--        <script src="<?php echo base_url(); ?>admin_assets/js/jquery.nanoscroller.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/data-tables/tables-data.js"></script>


<!-- ChartJS-->
<script src="<?php echo base_url(); ?>admin_assets/js/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/widget.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/tmpl.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/load-image.all.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/canvas-to-blob.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-process.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-image.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-audio.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-video.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-validate.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/jquery.fileupload-ui.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/file-upload/custom-upload.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/select/fancySelect.js" type="text/javascript"></script>


<script>
    function readURLPRO(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#promo-priview-image').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
</script>



<!-- Eyes Jquery -->
<script>
    $c = 1;

    function showpass(id, cls)
    {
        if ($c == 1)
        {
            $(id).attr("type", "text");
            $(cls).css("color", "red");
            $(cls).removeClass("far fa-eye");
            $(cls).addClass("far fa-eye-slash");
            $c = 0;
        } else
        {
            $(id).attr("type", "password");
            $(cls).css("color", "#000");
            $(cls).removeClass("far fa-eye-slash");
            $(cls).addClass("far fa-eye");
            $c = 1;
        }

    }
    

$("#admin_profile").change(function() {
  readURL(this);
});

</script>

<!-- ModelBox JQuery -->
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').show(200);
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }



    setTimeout(function () {
        $(".my_alert_success").fadeOut("slow");
    }, 3000);
    setTimeout(function () {
        $(".my_alert").fadeOut("slow");
    }, 3000);


</script>        
<!-- Google Analytics:  -->
<script>
    (function (i, s, o, g, r, a, m)
    {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function ()
        {
            (i[r].q = i[r].q || []).push(arguments);
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-3560057-28', 'auto');
    ga('send', 'pageview');
</script>

<!--page js-->
<script>

    $("#sparkline8").sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 14, 4, 2, 14, 12, 7], {
        type: 'bar',
        barWidth: 4,
        height: '40px',
        barColor: '#01a8fe',
        negBarColor: '#c6c6c6'});
    $(".sparkline8").sparkline([4, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline9").sparkline([3, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline10").sparkline([4, 1], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline11").sparkline([1, 3], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline12").sparkline([3, 5], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline13").sparkline([6, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });

    //moris chart
    $(function () {
        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(16, 161, 236,0.5)",
                    strokeColor: "rgba(16, 161, 236,1)",
                    pointColor: "rgba(16, 161, 236,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(0, 0, 0,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(102, 190, 236,0.5)",
                    strokeColor: "rgba(102, 190, 236,0.7)",
                    pointColor: "rgba(102, 190, 236,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(0, 0, 0,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "#ddd",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);


        var polarData = [
            {
                value: 300,
                color: "#01a8fe",
                highlight: "#3d3f4b",
                label: "App"
            },
            {
                value: 140,
                color: "#6ec6f3",
                highlight: "#3d3f4b",
                label: "Software"
            },
            {
                value: 200,
                color: "#35aeed",
                highlight: "#3d3f4b",
                label: "Laptop"
            }
        ];

        var polarOptions = {
            scaleShowLabelBackdrop: true,
            scaleBackdropColor: "rgba(255,255,255,0.75)",
            scaleBeginAtZero: true,
            scaleBackdropPaddingY: 1,
            scaleBackdropPaddingX: 1,
            scaleShowLine: true,
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true

        };

        var ctx = document.getElementById("polarChart").getContext("2d");
        var myNewChart = new Chart(ctx).PolarArea(polarData, polarOptions);

        var barData = {
            labels: ["Monday", "Tuesday", "Wedneday", "Thrusday", "Friday"],
            datasets: [
                {
                    label: "My Second dataset",
                    fillColor: "#01a8fe",
                    strokeColor: "#01a8fe",
                    highlightFill: "#6ec6f3",
                    highlightStroke: "#6ec6f3",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };

        var barOptions = {
            scaleBeginAtZero: true,
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.01)",
            scaleGridLineWidth: 1,
            barShowStroke: true,
            barStrokeWidth: 1,
            barValueSpacing: 1,
            barDatasetSpacing: 1,
            responsive: true
        };


        var ctx = document.getElementById("barChart").getContext("2d");
        var myNewChart = new Chart(ctx).Bar(barData, barOptions);

        var radarData = {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(16, 161, 236,1)",
                    strokeColor: "rgba(16, 161, 236,1)",
                    pointColor: "rgba(16, 161, 236,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(16, 161, 236,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(102, 190, 236,1)",
                    strokeColor: "rgba(102, 190, 236,1)",
                    pointColor: "rgba(102, 190, 236,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(255,255,255,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]
        };

        var radarOptions = {
            scaleShowLine: true,
            angleShowLineOut: true,
            scaleShowLabels: false,
            scaleBeginAtZero: true,
            angleLineColor: "rgba(0,0,0,.1)",
            angleLineWidth: 1,
            pointLabelFontStyle: "normal",
            pointLabelFontSize: 10,
            pointLabelFontColor: "#666",
            pointDot: true,
            pointDotRadius: 3,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };

        var ctx = document.getElementById("radarChart").getContext("2d");
        var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

        var data = [{
                label: "Sales 1",
                data: 21,
                color: "#d3d3d3"
            }, {
                label: "Sales 2",
                data: 3,
                color: "#bababa"
            }, {
                label: "Sales 3",
                data: 15,
                color: "#79d2c0"
            }, {
                label: "Sales 4",
                data: 52,
                color: "#01a8fe"
            }];

        var doughnutData = [
            {
                value: 300,
                color: "#6cc5f3",
                highlight: "#01a8fe",
                label: "Chorme"
            },
            {
                value: 150,
                color: "#dedede",
                highlight: "#01a8fe",
                label: "Mozilla"
            },
            {
                value: 130,
                color: "#43b9f5",
                highlight: "#01a8fe",
                label: "Safari"
            }
        ];

        var doughnutOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 4,
            percentageInnerCutout: 45, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true
        };


        var ctx = document.getElementById("doughnutChart").getContext("2d");
        var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

//line chart
        Morris.Line({
            element: 'morris-line-chart',
            data: [{y: '2006', a: 0, b: 10},
                {y: '2007', a: 25, b: 35},
                {y: '2008', a: 30, b: 40},
                {y: '2009', a: 20, b: 25},
                {y: '2010', a: 37, b: 40}],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#76c3ea', '#01a8fe']
        });


    });
</script>
<script>
    (function (i, s, o, g, r, a, m)
    {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function ()
        {
            (i[r].q = i[r].q || []).push(arguments);
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-3560057-28', 'auto');
    ga('send', 'pageview');
</script>



<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<!--data table end-->

<!--validation start-->
<script type="text/javascript">
    $("input[check_control]").keypress(function (e) {
        if ($(this).attr("check_control") == "alpha") {
            var regex = new RegExp("^[a-zA-Z ]+$");
        } else if ($(this).attr("check_control") == "number") {
            var regex = new RegExp("^[0-9]+$");
        } else if ($(this).attr("check_control") == "duration") {
            var regex = new RegExp("^[0-9a-zA-Z -]+$");
        } else {
            var regex = new RegExp("^[a-zA-Z0-9.@_]+$");
        }
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            $(this).removeClass("form_error").addClass("form_valid");
            return true;
        } else {
            $(this).removeClass("form_valid").addClass("form_error");
        }
        e.preventDefault();
        return false;
    });
    $("input[check_control]").blur(function () {
        var val = this.value;
        if (val == "") {
            $(this).removeClass("form_valid").addClass("form_error");
        } else {
            $(this).removeClass("form_error").addClass("form_valid");
        }
    });
</script>

<!--validation end-->