<template>
    <div>
        <div class="text-center mb-5">
            List of responses
        </div>
        <div v-if="loading == false" class="text-center">
            <v-progress-circular indeterminate color="primary"></v-progress-circular>
        </div>
        <div v-else-if="responses == ''" class="container text-center" style="margin-top:10%;">
            <div class="not_found">
                <v-layout column>
                    <v-flex>
                        <img src="../../assets/logo.png" id="interdit" width="70px">
                    </v-flex>
                    <v-flex>
                        <div class="novote">
                            No Responses Now
                        </div>
                    </v-flex>
                    <v-flex>
                        <div class="check">
                            please check later
                        </div>
                    </v-flex>
                </v-layout>
            </div>
        </div>
        <div v-else class="row">
            <div v-for="response in responses" :key="response.id" class="col-lg-4">
                <v-card max-width="344" outlined>
                    <v-list-item three-line>
                        <v-list-item-title class="text-h6 mb-1">
                            {{ response.question }}
                        </v-list-item-title>
                        <v-list-item-subtitle>{{response.Numbers}}</v-list-item-subtitle>
                    </v-list-item>
                </v-card>
            </div>
        </div>
    </div>
</template>

<script>
import responsive_service from '@/services/reports.js';
export default {
    name: "suggestion",
    created() {
        this.fetchData();
    },
    data() {
        return {
            snackbar: false,
            dialog_delete: false,
            message: '',
            load: false,
            item_selected: [],
            dialog: false,
            responses: [],
            search: '',
            loading: false,
        }
    },
    methods: {
        deleteFeedBack(feed) {
            this.dialog = true;
            this.item_selected = feed;
        },
        fetchData() {
            responsive_service.getReports().then((response) => {
                this.loading = true;
                this.responses = response.data.data;
            })
        },
        confrimDelete(id) {
            this.load = true;
            feedbackService.DeleteFeedback(id).then((res) => {
                this.snackbar = true;
                this.message = res.data.data;
                this.dialog = false;
                this.load = false;
                this.fetchData();
            });
        },
    },
    computed: {

    },
    components: {

    }
}
</script>

<style scoped></style>