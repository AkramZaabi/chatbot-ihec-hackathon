<template>
    <div class="mb-1">
        <v-container elevation="5">
            <v-row class="m-2">
                <h4>
                    <span style="color: #5094df">Talel </span>Mejri
                </h4>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { CurentView } from "@/store/StoreView.js";
export default {
    created() {
      
    },
    setup() {
        const store_view = CurentView();
        return {  store_view };
    },
    data() {
        return {
            dialog: false
        }
    },
    methods: {
        changerView(data) {
            this.store_view.suppView();
            this.store_view.setView(data);
        },
        logout() {
            this.store_view.suppView();
            this.store.logout();
            this.$router.push({ name: 'home' });
        },
      
    },
    computed: {
      
    }
};

</script>

<style scoped></style>