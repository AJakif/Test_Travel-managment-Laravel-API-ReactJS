const baseUrl = "http://localhost:8000/api/packages"
import axios from "axios";
const packages = {};

packages.list = async () => {
  const urlList = baseUrl+"/role"
  const res = await axios.get(urlList)
  .then(response=> {return response.data })
  .catch(error=>{ return error; })
  return res;
}

packages.save = async (data) => {
  const urlSave= baseUrl+"/create"
  const res = await axios.post(urlSave,data)
  .then(response=> {return response.data })
  .catch(error=>{ return error; })
  return res;
}

packages.listPackages = async () => {
  const urlList = baseUrl+"/list"
  const res = await axios.get(urlList)
  .then(response=>{ return response.data; })
  .catch(error=>{ return error; })
  return res;
}

packages.get = async (id) => {

  const urlGet = baseUrl+"/get/"+id
  const res = await axios.get(urlGet)
  .then(response=>{ return response.data })
  .catch(error => { return error })
  return res;

}

packages.update = async (data) => {
  const urlUpdate = baseUrl+"/update/"+data.id
  const res = await axios.put(urlUpdate,data)
  .then(response=>{ return response.data; })
  .catch(error =>{ return error; })
  return res;
}

packages.delete = async (id) => {
  const urlDelete = baseUrl+"/delete/"+id
  const res = await axios.delete(urlDelete)
  .then(response=> { return response.data })
  .catch(error =>{ return error })
  return res;
}

export default employee
