<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-body table-responsive">
<h3 align="center"> Paid Invoice</h3>
        <div id="bar_chartdiv"></div>

        <hr>
        <h3 align="center"> Unpaid Invoice</h3>
        <div id="bar_chartdiv2"></div>

            </div>
        </div>
	</div>	
</div>

<style>
    #bar_chartdiv {
        width		: 100%;
        height		: 397px;
        font-size	: 11px;
    }	
	.amcharts-chart-div a{
    display:none !important;
}									
</style>
<style>
    #bar_chartdiv2 {
        width		: 100%;
        height		: 397px;
        font-size	: 11px;
    }	
	.amcharts-chart-div a{
    display:none !important;
}									
</style>
    <script>
        var chart = AmCharts.makeChart("bar_chartdiv", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,
            "dataProvider": [
        
        <?php $select_all_student_and_amount_from_invoice = $this->db->get_where('invoice', array('year' => $running_year))->result_array();
            foreach ($select_all_student_and_amount_from_invoice as $key =>$selected_student_and_amount_from_invoice_table):?>


                    {
                        "country": "<?php echo $this->crud_model->get_type_name_by_id('student', $selected_student_and_amount_from_invoice_table['student_id']);?>",
                        "visits": "<?php echo $selected_student_and_amount_from_invoice_table['amount_paid'];?>",
                        "color": "#99BDF9"
                    },
                <?php endforeach;?>

            ],
            "valueAxes": [{
                    "position": "left",
                    "title": "Amount Paid"
                }],
            "graphs": [{
                    "balloonText": "[[category]]: <b>[[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 1,
                    "lineAlpha": 0.1,
                    "type": "column",
                    "valueField": "visits"
                }],
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": true,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "country",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90,
                "position": "bottom",
                "title": "All Student Name",
            },
            "export": {
                "enabled": true
            }

        });
        jQuery('.chart-input').off().on('input change', function () {
            var property = jQuery(this).data('property');
            var target = chart;
            chart.startDuration = 0;

            if (property == 'topRadius') {
                target = chart.graphs[0];
                if (this.value == 0) {
                    this.value = undefined;
                }
            }

            target[property] = this.value;
            chart.validateNow();
        });
    </script>

<script>
        var chart = AmCharts.makeChart("bar_chartdiv2", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,
            "dataProvider": [
        
        <?php $select_all_student_and_amount_from_invoice = $this->db->get_where('invoice', array('year' => $running_year))->result_array();
            foreach ($select_all_student_and_amount_from_invoice as $key =>$selected_student_and_amount_from_invoice_table):?>


                    {
                        "country": "<?php echo $this->crud_model->get_type_name_by_id('student', $selected_student_and_amount_from_invoice_table['student_id']);?>",
                        "visits": "<?php echo $selected_student_and_amount_from_invoice_table['due'];?>",
                        "color": "#99BDF9"
                    },
                <?php endforeach;?>

            ],
            "valueAxes": [{
                    "position": "left",
                    "title": "Amount to Pay"
                }],
            "graphs": [{
                    "balloonText": "[[category]]: <b>[[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 1,
                    "lineAlpha": 0.1,
                    "type": "column",
                    "valueField": "visits"
                }],
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": true,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "country",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90,
                "position": "bottom",
                "title": "All Student Name",
            },
            "export": {
                "enabled": true
            }

        });
        jQuery('.chart-input').off().on('input change', function () {
            var property = jQuery(this).data('property');
            var target = chart;
            chart.startDuration = 0;

            if (property == 'topRadius') {
                target = chart.graphs[0];
                if (this.value == 0) {
                    this.value = undefined;
                }
            }

            target[property] = this.value;
            chart.validateNow();
        });
    </script>