import React,{useState,useEffect} from 'react'
import {useHistory} from 'react-router-dom'
import Header from "./Header";
function Login(){

    
    useEffect(()=>{
        if(localStorage.getItem('User-Info')) {
            history.push("/add")
        }
      },[])
    const [email,SetEmail]=useState("")
    const [password,SetPassword]=useState("")

    const history = useHistory();
    async function login()
    {
         let item= {email,password}
    console.warn(item)
   let result =await fetch("http://127.0.0.1:8000/api/login",{
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
         
            <h1>Login</h1>
            <input type="text" value={email} onChange={(e)=>SetEmail(e.target.value)} classname="from-control" placeholder="Email" />
            <br/>
            <input type="password" value={password} onChange={(e)=>SetPassword(e.target.value)} classname="from-control" placeholder="Password" />
           <br/>
           <button onClick={login} className="btn btn-primary"> Login</button>
        </div>
        </>
    )
}

export default Login