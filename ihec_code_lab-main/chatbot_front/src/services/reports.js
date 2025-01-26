import axios from "axios";


export default {
    getReports() {
        return axios.get(`http://127.0.0.1:8000/api/getReports`);
    },
    AddReport(data) {
        return axios.post("http://127.0.0.1:8000/api/AddReport/", data)
    },
}