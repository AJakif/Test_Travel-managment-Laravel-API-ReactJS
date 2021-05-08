import Header from "./Header";
import React,{useState,useEffect} from 'react'
import {Table} from 'react-bootstrap'
import {Link} from 'react-router-dom'
function ViewPackage(){

    const[data,setData]=useState([]);
    useEffect( ()=>{
       getData();
    },[])
  async function deleteOperation(p_id)
   {
      let result = await fetch("http://127.0.0.1:8000/api/deletepackage/"+p_id,{
       method:'DELETE'
       });
       result=await result.json();
getData();
   }
   async function getData(){
    let result = await fetch("http://127.0.0.1:8000/api/list");
     result = await result.json();
    setData(result)
}

    return(
        <div>
            <Header/>
            <h1>Package List</h1>
            <Table>
                <tr>
                    <td>package_name</td>
                    <td>package_type</td>
                    <td>package_price</td>
                    <td>package_feature</td>
                    <td>package_details</td>
                    <td>package_time_duration</td>
                    <td>package_image</td>
                    <td>status</td>
                    <td>Operation</td>
                   
                </tr>
                {
                    data.map((item)=>
                        <tr>
                    <td>{item.package_name}</td>
                    <td>{item.package_type}</td>
                    <td>{item.package_price}</td>
                    <td>{item.package_feature}</td>
                    <td>{item.package_details}</td>
                    <td>{item.package_time_duration}</td>
                    <td><img style={{width:100}} src={"http://localhost:8000/"+item.package_image}/></td>
                    <td>{item.status}</td>
                    <td><span onClick={()=>deleteOperation(item.p_id)} className="delete">Delete</span></td>
                    <td>
                        <Link to={"update/"+item.p_id}>
                        <span  className="update">Update</span>
                        </Link>
                        </td>
                        
                        </tr>
                     
                    )
                }
            
            </Table>
        </div>
    )
}
export default ViewPackage;