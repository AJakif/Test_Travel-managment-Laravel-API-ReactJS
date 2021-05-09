
import axios from "axios"
const baseUrl = "http://localhost:8000/api"
const user = {};



user.listuser = async () => {
  const urlList = baseUrl+"/dashboard/Userlist"
  const res = await axios.get(urlList)
  .then(response=>{ return response.data; })
  .catch(error=>{ return error })
  return res;
}


export default user
