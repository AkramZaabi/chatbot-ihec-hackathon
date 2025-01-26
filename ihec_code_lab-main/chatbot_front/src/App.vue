<template>
  <v-app>
    <preloaderVue></preloaderVue>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",
  mounted(){
    let test = new SpeechSynthesisUtterance("welcome" );
    speechSynthesis.speak(test);
  },
  data: () => ({
    //
  }),
};
</script>
