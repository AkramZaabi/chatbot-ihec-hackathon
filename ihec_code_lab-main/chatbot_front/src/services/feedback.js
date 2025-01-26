import axios from "axios";

import "@/plugins/axios";

export default {
    getFeedBacks(per_page,page) {
       return axios.get(`getFeedBacks?${per_page!=6 ? 'per_page='+per_page : ''}&page=${page}`);
    },
    AddFeedBack(data) {
        return axios.post("AddFeedBack/", data)
    },
    DeleteFeedback(id) {
        return axios.delete("DeleteFeedBack/"+id)
    },
}