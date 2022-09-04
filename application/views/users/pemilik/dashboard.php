    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
		<div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Kunjungan Pasien</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChartPengunjung">
                    	
                    </canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Antrian Pasien</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
		            <div class="chart-area">
	    			<div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Untuk hari ini Tanggal : <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?> </div> 
		    			<div class="table-wrapper-scroll-y my-custom-scrollbar">
					        <table class="table table-bordered table-striped mb-0">
							  <thead class="thead-dark text-center">
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Nama Pasien</th>
							      <th scope="col">No Telepon</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php foreach ($DetAntrian as $det) : ?>
						         	<tr>
								      <th scope="row"> <?= $det['nomor_antrian'];?></th>
								      <td> <?= $det['nama_users'];?></td>
								      <td> <?= $det['telepon'];?></td>
								    </tr> 
								<?php endforeach;?>
							  </tbody>
							</table>
						</div>
						<div class="mt-2">
				          <div class="card border-left-primary shadow h-100 py-2 border-bottom-primary">
				            <div class="card-body">
				              <div class="row no-gutters align-items-center">
				                <div class="col mr-2">
				                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total antrian</div>
				                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tes;?></div>
				                </div>
				                <div class="col-auto">
				                  <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
				                </div>
				              </div>
				            </div>
				          </div>
				        </div>
					</div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<!-- End of Main Content -->

<script type="text/javascript">
	$(document).ready(function() {
	    // Set new default font family and font color to mimic Bootstrap's default styling
		Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#858796';

		function number_format(number, decimals, dec_point, thousands_sep) {
		  // *     example: number_format(1234.56, 2, ',', ' ');
		  // *     return: '1 234,56'
		  number = (number + '').replace(',', '').replace(' ', '');
		  var n = !isFinite(+number) ? 0 : +number,
		    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		    s = '',
		    toFixedFix = function(n, prec) {
		      var k = Math.pow(10, prec);
		      return '' + Math.round(n * k) / k;
		    };
		  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
		  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		  if (s[0].length > 3) {
		    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		  }
		  if ((s[1] || '').length < prec) {
		    s[1] = s[1] || '';
		    s[1] += new Array(prec - s[1].length + 1).join('0');
		  }
		  return s.join(dec);
		}

		// Area Chart Example
		var ctx = document.getElementById("myAreaChartPengunjung");
		var myLineChart = new Chart(ctx, {
		  type: 'line',
		  data: {
		    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
		    datasets: [{
		      label: "Pasien",
		      lineTension: 0.3,
		      backgroundColor: "rgba(78, 115, 223, 0.05)",
		      borderColor: "rgba(78, 115, 223, 1)",
		      pointRadius: 3,
		      pointBackgroundColor: "rgba(78, 115, 223, 1)",
		      pointBorderColor: "rgba(78, 115, 223, 1)",
		      pointHoverRadius: 3,
		      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
		      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
		      pointHitRadius: 10,
		      pointBorderWidth: 2,
		      data: [
			      0, 
			      0, 
			      0, 
			      0, 
			      0, 
			      <?php echo json_encode($bulan6);?>,  
			      <?php echo json_encode($bulan7);?>, 
			      <?php echo json_encode($bulan8);?>,  
			      <?php echo json_encode($bulan9);?>, 
			      <?php echo json_encode($bulan10);?>, 
			      <?php echo json_encode($bulan11);?>, 
			      <?php echo json_encode($bulan12);?>, 
			  ],
		    }],
		  },
		  options: {
		    maintainAspectRatio: false,
		    layout: {
		      padding: {
		        left: 10,
		        right: 25,
		        top: 25,
		        bottom: 0
		      }
		    },
		    scales: {
		      xAxes: [{
		        time: {
		          unit: 'date'
		        },
		        gridLines: {
		          display: true,
		          drawBorder: true
		        },
		        ticks: {
		          maxTicksLimit: 12
		        }
		      }],
		      yAxes: [{
		        ticks: {
		          maxTicksLimit: 10,
		          padding: 10,
		          // Include a dollar sign in the ticks
		          callback: function(value, index, values) {
		            return number_format(value);
		          }
		        },
		        gridLines: {
		          color: "rgb(234, 236, 244)",
		          zeroLineColor: "rgb(234, 236, 244)",
		          drawBorder: false,
		          borderDash: [2],
		          zeroLineBorderDash: [2]
		        }
		      }],
		    },
		    legend: {
		      display: false
		    },
		    tooltips: {
		      backgroundColor: "rgb(255,255,255)",
		      bodyFontColor: "#858796",
		      titleMarginBottom: 10,
		      titleFontColor: '#6e707e',
		      titleFontSize: 14,
		      borderColor: '#dddfeb',
		      borderWidth: 1,
		      xPadding: 15,
		      yPadding: 15,
		      displayColors: false,
		      intersect: false,
		      mode: 'index',
		      caretPadding: 10,
		      callbacks: {
		        label: function(tooltipItem, chart) {
		          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
		          return datasetLabel + ':' + number_format(tooltipItem.yLabel) + 'Orang';
		        }
		      }
		    }
		  }
		});
  	});
</script>

