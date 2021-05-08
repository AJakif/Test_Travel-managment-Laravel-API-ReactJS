import Header from "./Header";
import React,{useState} from 'react'
import {useHistory} from 'react-router-dom'
function AddPackage(){


    const [package_name,SetPackage_name]=useState("")
    const [package_type,SetPackage_type]=useState("")
    const [package_price,SetPackage_price]=useState("")
    const [package_feature,SetPackage_feature]=useState("")
    const [package_details,SetPackage_details]=useState("")
    const [package_time_duration,SetPackage_time_duration]=useState("")
    const [package_image,SetPackage_image]=useState("")
    const [status,SetStatus]=useState("")
    
    const history = useHistory();
       async function add()
        {
            
        console.warn(package_name,package_type,package_price,package_feature,package_details,package_time_duration,package_image,status)
const formData =new FormData();
formData.append('package_name',package_name);
formData.append('package_type',package_type);
formData.append('package_price',package_price);
formData.append('package_feature',package_feature);
formData.append('package_details',package_details);
formData.append('package_time_duration',package_time_duration);
formData.append('package_image',package_image);
formData.append('status',status);


       let result =await fetch("http://127.0.0.1:8000/api/addpackage",{
            method:'POST',
            body: formData
        })
       alert("Data has been Saved")
        history.push("/")
    }


    return(
        <>
        <Header/>
        <div className="col-sm-6 offset-sm-3">
            <h1>Package</h1>
            <input type="text" value={package_name} onChange={(e)=>SetPackage_name(e.target.value)} classname="from-control" placeholder="package_name" />
            <br/>
            <input type="number"value={package_type} onChange={(e)=>SetPackage_type(e.target.value)} classname="from-control" placeholder="package_type" />
           <br/>
            <input type="text"value={package_price} onChange={(e)=>SetPackage_price(e.target.value)} classname="from-control" placeholder="package_price" />
            <br/>
            <input type="text" value={package_feature} onChange={(e)=>SetPackage_feature(e.target.value)} classname="from-control" placeholder="package_feature" />
            <br/>
            <input type="text" value={package_details} onChange={(e)=>SetPackage_details(e.target.value)} classname="from-control" placeholder="package_details" />
            <br/>
            <input type="date" value={package_time_duration} onChange={(e)=>SetPackage_time_duration(e.target.value)} classname="from-control" placeholder="package_time_duration" />
            <br/>
            <input type="file" value={package_image} onChange={(e)=>SetPackage_image(e.target.value)} classname="from-control" placeholder="package_image" />
       <br/>
       <input type="number" value={status} onChange={(e)=>SetStatus(e.target.value)} classname="from-control" placeholder="status" />
       <br/>
       <button onClick={add} className="btn btn-primary"> Add Package</button>
       
        </div>
        </>
    )
}


export default AddPackage