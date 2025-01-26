import Axios from "axios";
export default {
    sendText(data){
        
        return Axios.post('http://127.0.0.1:5050/chat',{"message":data});
    }
}