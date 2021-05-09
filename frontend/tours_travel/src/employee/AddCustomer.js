import React,{useState,useEffect} from 'react'
import {useHistory} from 'react-router-dom'
import Header from "./Header";
function AddCustomer(){


const [fullname,SetFullname]=useState("")
const [username,SetUsername]=useState("")
const [email,SetEmail]=useState("")
const [address,SetAddress]=useState("")
const [phone,SetPhone]=useState("")
const [password,SetPassword]=useState("")
const [gender,SetGender]=useState("")


const history = useHistory();
   async function register()
    {
         let item= {fullname,username,email,address,phone,password,gender}
    console.warn(item)
   let result =await fetch("http://127.0.0.1:8000/api/register",{
        method:'POST',
        body:JSON.stringify(item),
        headers:{
            "Content-Type":'application/json',
            "Accept":'application/json'
        }
    })
    result = await result.json()
    console.warn("result",result)
    localStorage.setItem("User-Info",JSON.stringify(result))
    history.push("/add")
}

    return(
        <>
        <Header/>
        <div className="col-sm-6 offset-sm-3">
            <h1>Customer</h1>
            <input type="text" value={fullname} onChange={(e)=>SetFullname(e.target.value)} classname="from-control" placeholder="Fullname" />
            <br/>
            <input type="text"value={username} onChange={(e)=>SetUsername(e.target.value)} classname="from-control" placeholder="Username" />
           <br/>
            <input type="email"value={email} onChange={(e)=>SetEmail(e.target.value)} classname="from-control" placeholder="email" />
            <br/>
            <input type="text" value={address} onChange={(e)=>SetAddress(e.target.value)} classname="from-control" placeholder="address" />
            <br/>
            <input type="phone" value={phone} onChange={(e)=>SetPhone(e.target.value)} classname="from-control" placeholder="phone" />
            <br/>
            <input type="password" value={password} onChange={(e)=>SetPassword(e.target.value)} classname="from-control" placeholder="password" />
            <br/>
            <input type="text" value={gender} onChange={(e)=>SetGender(e.target.value)} classname="from-control" placeholder="gender" />
       <br/>
       <br/>
       <button onClick={register} className="btn btn-primary"> Register</button>
       
        </div>
        </>
    )
}
export default AddCustomer