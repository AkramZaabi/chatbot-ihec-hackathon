<template>
  <v-app id="app">
    <preloaderVue></preloaderVue>
    <router-view v-slot="{ Component }">
        <component :is="Component" />
    </router-view>
  </v-app>
</template>

<script>
import AOS from "aos";
import 'animate.css';
import preloaderVue from './components/preloader.vue';
export default {
  name: 'App',
  components: {
    preloaderVue
  },
  mounted() {
    AOS.init();
    let test = new SpeechSynthesisUtterance("welcome" );
    speechSynthesis.speak(test);
  },
  data() {
    return {

    }
  }
};
</script>

<style scoped>

</style>
