import axios from "axios";


export default {
    getFeedBacks(per_page,page) {
       return axios.get(`http://127.0.0.1:8000/api/getFeedBacks?${per_page!=6 ? 'per_page='+per_page : ''}&page=${page}`);
    },
    AddFeedBack(data) {
        return axios.post("http://127.0.0.1:8000/api/AddFeedBack/", data)
    },
    DeleteFeedback(id) {
        return axios.delete("http://127.0.0.1:8000/api/DeleteFeedBack/"+id)
    },
}