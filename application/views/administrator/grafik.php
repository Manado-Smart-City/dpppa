
<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: ''
                }
            },
            series:[{
                color:'#a0d0e0',
            }],
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>'+ this.point.y;
                }
            }
        });
    });
</script>

    <div class="box-header with-border">
    <div class="box-title"><a style="font-size:18px">Grafik Kunjungan</a></div>
    <p style="font-size: 14px" > <i class="fa fa-circle text-info"></i> Pengunjung &nbsp;&nbsp;&nbsp; <i class="fa fa-circle text-warning"></i> Hits</p>
        <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
        </div>

<div class="box-body chat" id="chat-box">
<div id="container" style="min-width: 200px; height: 395px; margin: 0 auto"></div>
<table id="datatable" style='display:none'>
    <thead>
        <tr>
            <th></th>
            <th>Pengunjung</th>
            <th>Hits</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $grafik = $this->model_app->hits_dan_pengunjung();
            foreach ($grafik->result_array() as $row){

                echo "<tr>
                        <th>".tgl_grafik($row['tanggal'])."</th>
                        <td>$row[jumlah]</td> 
                        <td>$row[hitss]</td> 
                      </tr>";
            
            }
        ?>
    </tbody>
</table>
</div>


