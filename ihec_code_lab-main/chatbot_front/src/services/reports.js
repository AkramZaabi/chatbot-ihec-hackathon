import axios from "axios";

import "@/plugins/axios";

export default {
    getReports() {
        return axios.get(`getReports`);
    },
    AddReport(data) {
        return axios.post("AddReport/", data)
    },
}