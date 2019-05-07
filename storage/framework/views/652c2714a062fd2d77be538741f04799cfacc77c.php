<?php $__env->startSection('content'); ?>
  <div>
      <!DOCTYPE html>
<html lang="en">
<div class="container-fluid no-margin no-padding">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chwarchra Statistics</title>


  <link href="<?php echo e(asset('js/assets/styles.css')); ?>" rel="stylesheet" />

  <style>
    #chart {
      max-width: 650px;
      margin: 35px auto;
    }
  </style>
</head>

<body>
  <div id="chart">
    <apexchart type=bar height=350 :options="chartOptions" :series="series" />
  </div>

  <!-- Below element is just for displaying source code. it is not required. DO NOT USE -->
  <div id="html">
    &lt;div id="chart">
      &lt;apexchart type=bar height=350 :options="chartOptions":series="series" />
    &lt;/div>
  </div>

  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>

  <script>
    new Vue({
      el: '#chart',
      components: {
        apexchart: VueApexCharts,
        
      },
      data: {
        
        series: [{
          name: 'Total',
          data: [<?php echo e($employees_count); ?>, <?php echo e($computers_count); ?>,<?php echo e($networkDevices_count); ?>,<?php echo e($printers_count); ?>,<?php echo e($cameras_count); ?>,<?php echo e($other_devices_count); ?>]
          
        }],
        chartOptions: {
          annotations: {
            points: [{
              x: 'Total',
              seriesIndex: 0,
              label: {
                offsetY: 0,
                style: {
                
                  
                },
                
              }
            }]
          },
          chart: {
            height: 350,
            type: 'bar',
            
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
              endingShape: 'rounded'
            }
          },
          dataLabels: {
            enabled: true
            
          },
          stroke: {
            width: 3
            
          },

          grid: {
            row: {
              
            }
          },
          xaxis: {
            labels: {
              rotate: -45
            },
            categories: ['Employees', 'Computers', 'Network Devices', 'Printers', 'Cameras','Other Devices'
              
            ],
          },
          yaxis: {
            title: {
              text: 'Total',
            },
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'light',
              type: "horizontal",
              shadeIntensity: 0.25,
              gradientToColors:'',
              inverseColors: true,
              opacityFrom: 0.85,
              opacityTo: 0.85,
              stops: [50, 0, 2000],
              
              
              
            },
            colors:['#4b174b', '#A11580', '#A11580']
            
            
          }
        }
      }
      
    })
  </script>

</body>

</html>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/stats.blade.php ENDPATH**/ ?>