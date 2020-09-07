 <!--row -->
            <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Hostel');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel_room');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Rooms');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('hostel_category');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Hostel Category');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-inverse"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('dormitory');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Dormitory');?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    

            </div>
                <!--/row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="stats-row">


                                <!-- Styles -->
                                <style>
                                #chartdiv1 {
                                width: 100%;
                                height: 500px;
                                }

                                .amcharts-chart-div a{
                                    display:none !important;
                                }	

                                </style>

                                <!-- Chart code -->
                                <script>
                                am4core.ready(function() {

                                // Themes begin
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                // Create chart instance
                                var chart = am4core.create("chartdiv1", am4charts.PieChart);

                                // Add data
                                chart.data = [
                    
                    <?php $hostel_rooms = $this->db->get('hostel_room')->result_array(); //$this->crud_model->get_invoice_info();
                            foreach ($hostel_rooms as $key => $rooms_selected):?>

                                {
                                "country": "<?php echo $rooms_selected['name'];?>",
                                "litres": <?php echo $rooms_selected['cost_bed'];?>
                                }, 
                    <?php endforeach;?>
                                
                                ];

                                // Add and configure Series
                                var pieSeries = chart.series.push(new am4charts.PieSeries());
                                pieSeries.dataFields.value = "litres";
                                pieSeries.dataFields.category = "country";
                                pieSeries.innerRadius = am4core.percent(50);
                                pieSeries.ticks.template.disabled = true;
                                pieSeries.labels.template.disabled = true;

                                var rgm = new am4core.RadialGradientModifier();
                                rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
                                pieSeries.slices.template.fillModifier = rgm;
                                pieSeries.slices.template.strokeModifier = rgm;
                                pieSeries.slices.template.strokeOpacity = 0.4;
                                pieSeries.slices.template.strokeWidth = 0;

                                chart.legend = new am4charts.Legend();
                                chart.legend.position = "right";

                                }); // end am4core.ready()
                                </script>

                                <!-- HTML -->
                                <div id="chartdiv1"></div>

                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="stats-row">
                                

                        <style>
                        #chartdiv {
                        width: 100%;
                        height: 500px;
                        }

                        .amcharts-chart-div a{
                            display:none !important;
                        }	

                        </style>

              

                        <!-- Chart code -->
                        <script>
                        am4core.ready(function() {

                        // Themes begin
                        am4core.useTheme(am4themes_animated);
                        // Themes end

                        /**
                        * Chart design taken from Samsung health app
                        */

                        var chart = am4core.create("chartdiv", am4charts.XYChart);
                        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                        chart.paddingBottom = 30;

                        chart.data = [
                
                        <?php $select_student = $this->db->get_where('student', array('session' => $running_year))->result_array(); //$this->crud_model->get_invoice_info();
                            foreach ($select_student as $key => $student_selected):?>
                            
                            {
                            "name": "<?php echo $this->crud_model->get_type_name_by_id('student', $student_selected['student_id']);?>",
                            "steps": <?php echo $this->db->get_where('dormitory', array('dormitory_id' => $student_selected['dormitory_id']))->row()->capacity;?>,
                            "href": "<?php echo base_url();?>uploads/student_image/<?php echo $student_selected['student_id']. '.jpg';?>"
                            }, 
                        <?php endforeach;?>
                        
                        ];

                        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "name";
                        categoryAxis.renderer.grid.template.strokeOpacity = 0;
                        categoryAxis.renderer.minGridDistance = 10;
                        categoryAxis.renderer.labels.template.dy = 35;
                        categoryAxis.renderer.tooltip.dy = 35;

                        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.renderer.inside = true;
                        valueAxis.renderer.labels.template.fillOpacity = 0.3;
                        valueAxis.renderer.grid.template.strokeOpacity = 0;
                        valueAxis.min = 0;
                        valueAxis.cursorTooltipEnabled = false;
                        valueAxis.renderer.baseGrid.strokeOpacity = 0;

                        var series = chart.series.push(new am4charts.ColumnSeries);
                        series.dataFields.valueY = "steps";
                        series.dataFields.categoryX = "name";
                        series.tooltipText = "{valueY.value}";
                        series.tooltip.pointerOrientation = "vertical";
                        series.tooltip.dy = - 6;
                        series.columnsContainer.zIndex = 100;

                        var columnTemplate = series.columns.template;
                        columnTemplate.width = am4core.percent(50);
                        columnTemplate.maxWidth = 66;
                        columnTemplate.column.cornerRadius(60, 60, 10, 10);
                        columnTemplate.strokeOpacity = 0;

                        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
                        series.mainContainer.mask = undefined;

                        var cursor = new am4charts.XYCursor();
                        chart.cursor = cursor;
                        cursor.lineX.disabled = true;
                        cursor.lineY.disabled = true;
                        cursor.behavior = "none";

                        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
                        bullet.circle.radius = 30;
                        bullet.valign = "bottom";
                        bullet.align = "center";
                        bullet.isMeasured = true;
                        bullet.mouseEnabled = false;
                        bullet.verticalCenter = "bottom";
                        bullet.interactionsEnabled = false;

                        var hoverState = bullet.states.create("hover");
                        var outlineCircle = bullet.createChild(am4core.Circle);
                        outlineCircle.adapter.add("radius", function (radius, target) {
                            var circleBullet = target.parent;
                            return circleBullet.circle.pixelRadius + 10;
                        })

                        var image = bullet.createChild(am4core.Image);
                        image.width = 60;
                        image.height = 60;
                        image.horizontalCenter = "middle";
                        image.verticalCenter = "middle";
                        image.propertyFields.href = "href";

                        image.adapter.add("mask", function (mask, target) {
                            var circleBullet = target.parent;
                            return circleBullet.circle;
                        })

                        var previousBullet;
                        chart.cursor.events.on("cursorpositionchanged", function (event) {
                            var dataItem = series.tooltipDataItem;

                            if (dataItem.column) {
                                var bullet = dataItem.column.children.getIndex(1);

                                if (previousBullet && previousBullet != bullet) {
                                    previousBullet.isHover = false;
                                }

                                if (previousBullet != bullet) {

                                    var hs = bullet.states.getKey("hover");
                                    hs.properties.dy = -bullet.parent.pixelHeight + 30;
                                    bullet.isHover = true;

                                    previousBullet = bullet;
                                }
                            }
                        })

                        }); // end am4core.ready()
                        </script>

                        <!-- HTML -->
                        <div id="chartdiv"></div>


                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
               
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Recently Added Teachers');?></h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                            <?php $get_teacher_from_model = $this->crud_model->list_all_teacher_and_order_with_teacher_id();
                                    foreach ($get_teacher_from_model as $key => $teacher):?>
                                            <td><img src="<?php echo $teacher['face_file'];?>" class="img-circle" width="40px"></td>
                                            <td><?php echo $teacher['name'];?></td>
                                            <td><?php echo $teacher['email'];?></td>
                                            <td><?php echo $teacher['phone'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Recently Added Students');?></h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                            <?php $get_student_from_model = $this->crud_model->list_all_student_and_order_with_student_id();
                                    foreach ($get_student_from_model as $key => $student):?>
                                            <td><img src="<?php echo $student['face_file'];?>" class="img-circle" width="40px"></td>
                                            <td><?php echo $student['name'];?></td>
                                            <td><?php echo $student['email'];?></td>
                                            <td><?php echo $student['phone'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->