import Header from "./Header";
import {withRouter} from 'react-router-dom'
import {useState,useEffect} from 'react'
function UpdatePackage(props){

    const [data,setData]=useState([])
    console.warn("props",props.match.params.p_id)
    useEffect(async()=>{
      let result=  await fetch("http://127.0.0.1:8000/api/package/"+props.match.params.p_id);
        result =await result.json();
        setData(result);
    })
    return(
        <div>
            <Header/>
            <h1>Update Package</h1>
            <input type="text" defaultValue={data.package_name}/> <br/> <br/>
            <input type="text" defaultValue={data.package_type}/> <br/> <br/>
            <input type="text" defaultValue={data.package_price}/> <br/> <br/>
            <input type="text" defaultValue={data.package_feature}/> <br/> <br/>
            <input type="text" defaultValue={data.package_details}/> <br/> <br/>
            <input type="text" defaultValue={data.package_time_duration}/> <br/> <br/>
            <input type="text" defaultValue={data.status}/> <br/> <br/>
         
            <button>Update</button>
        </div>
    )
}
export default withRouter(UpdatePackage)