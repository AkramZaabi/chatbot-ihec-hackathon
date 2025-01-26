<template>
  <div class="mt-5 py-5">
    <div class="content">
    </div>
    <div class="card mt-5" data-aos="fade-down">
      <v-chart class="chart" :option="chartOption" autoresize />
    </div>
  </div>
</template>

<script>
import responsive_service from "@/services/reports.js";
import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { BarChart } from "echarts/charts";
import { TitleComponent, TooltipComponent, GridComponent, LegendComponent } from "echarts/components";
import VChart, { THEME_KEY } from "vue-echarts";
import { defineComponent } from "vue";

use([CanvasRenderer, BarChart, GridComponent, TitleComponent, TooltipComponent, LegendComponent]);

export default defineComponent({
  name: "Stat",
  components: {
    VChart,
  },
  provide: {
    [THEME_KEY]: "dark",
  },
  data() {
    return {
      responses: [],
      loading: true,
      chartOption: {
        title: {
          text: "Responses Data",
          left: "center",
        },
        tooltip: {
          trigger: "axis",
          axisPointer: {
            type: "shadow",
          },
        },
        xAxis: {
          type: "category",
          data: [],
        },
        yAxis: {
          type: "value",
        },
        series: [
          {
            name: "Responses",
            type: "bar",
            data: [],
            barWidth: "50%",
            itemStyle: {
              color: "#4caf50",
            },
          },
        ],
      },
    };
  },
  methods: {
    fetchData() {
      responsive_service.getReports(6, 1).then((res) => {
        const data = res.data.data;
        this.chartOption.xAxis.data = data.map((item) => item.question);
        this.chartOption.series[0].data = data.map((item) => item.Numbers);
      })
    }

  },
  mounted() {
    this.fetchData();
  },
});
</script>

<style scoped>
.content {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-gap: 25px;
}

@media screen and (max-width: 950px) {
  .content {
    grid-template-columns: 1fr 1fr;
  }
}

@media screen and (max-width: 530px) {
  .content {
    grid-template-columns: 1fr;
    text-align: center;
  }
}

.chart {
  height: 50vh;
  width: 100%;
}

@media screen and (max-width: 750px) {
  .chart {
    height: 30vh;
    width: 50vw;
  }
}

@media screen and (max-width: 500px) {
  .chart {
    height: 30vh;
    width: 100vw;
  }
}
</style>
