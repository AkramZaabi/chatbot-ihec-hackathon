<template>
  <div :class="small ? 'small' : 'large'" id="dashboard">
    <div class="sidebar_position">
      <sidebarVue :etatsidbar="etatsidbar" @changreetat="changreetat" :small="small"></sidebarVue>
    </div>
    <transition name="fade" mode="out-in">
      <div :class="etatsidbar == true ? 'content close ' : 'content'">
        <HeaderDashboard></HeaderDashboard>
        <div v-if="test_ischef == true " class="ma-5 pa-5" id="home">
          <div v-if="store.view == 'stat'">
            <statistique></statistique>
          </div>
        </div>
        <div v-else class="ma-5 pa-5" id="home">
          <div v-if="store.view == 'stat'">
            <statistique>
            </statistique>
          </div>
          <div v-else-if="store.view == 'Responses'">
         <ResponseComp></ResponseComp>
          </div>
          <div v-else-if="store.view == 'FeedBack'">
            <FeedBackComp></FeedBackComp>
          </div>
          <div v-else-if="store.view == 'chat'">
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import statistique from '@/components/admin/statistique.vue';
import HeaderDashboard from '@/components/admin/headerAdmin.vue'
import sidebarVue from '@/components/admin/sidebar.vue'
import FeedBackComp from "@/components/admin/feedBacks.vue"
import ResponseComp from "@/components/admin/responses.vue"
import {CurentView} from "@/store/StoreView.js";

export default {
  created() {
  },
  setup(){
    const store=CurentView();
  
    return {store}
  },
  name: 'dashboard',
  data() {
    return {
      etatsidbar: false,
      show_all: true,
      snackbar: false,
      snackbar_edit: false,
      small: false,
      test_ischef: false
    }
  },
  mounted() {
    window.addEventListener('resize', this.onresize);
  },
  methods: {
    onresize() {
      if (window.innerWidth < 750) {
        this.etatsidbar = true;
        this.small = false;
      } else {
        this.etatsidbar = false;
        this.small = false;
      }
      if (window.innerWidth < 500) {
        this.small = true;
        this.etatsidbar = false;
      }
    },
    changreetat(etat) {
      this.etatsidbar = etat;
    },

  },
  components: {
    sidebarVue, HeaderDashboard, statistique,ResponseComp,FeedBackComp

  },

};
</script>

<style scoped>
.sidebar_position {
  position: fixed;
  z-index: 2 !important;
}

.content {
  width: calc(100%-280px);
  position: relative;
  scroll-behavior: smooth;
  transition: all 0.2s ease-in-out;
}

.large .content.close {
  width: calc(100%-90px) !important;
  margin-left: 90px !important;
  transition: all 0.2s ease-in-out;
  scroll-behavior: smooth;
}

.large .content {
  margin-left: 280px;

}

.small .content {
  margin-left: 0px !important;
}
</style>