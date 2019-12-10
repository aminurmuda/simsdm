<template>
    <div>
        <div style="height:400px;">
            <chartjs :type="'bar'" :data="requests" :options="options" :width="400" :height="400"></chartjs>
        </div>

        <!-- <div style="height:300px;">
            <chartjs :type="'bar'" :data="paid_leaves" :options="options" :width="200" :height="200"></chartjs>
        </div> -->

        <!-- <div style="height:300px;">
            <chartjs :type="'bar'" :data="requests" :options="options" :width="200" :height="200"></chartjs>
        </div> -->
    </div>
</template>
 
<script>
 
export default {
  props: {
      requests: {
          type: Object
      },
      paid_leaves: {
          type: Object
      }
  },
  data () {
    return {
      data: {
            labels: ['Sleeping', 'Designing', 'Coding', 'Cycling'],
            datasets: [{
                data: [20, 40, 5, 35],
                backgroundColor: [
                    '#1fc8db',
                    '#fce473',
                    '#42afe3',
                    '#ed6c63',
                    '#97cd76'
                ]
            }]
      },
      options: {
        segmentShowStroke: false,
        legend: {
        	"display": false
        },
        responsive: true,
        maintainAspectRatio: false,
      }
    }
  }
}
</script>