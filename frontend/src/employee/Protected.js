import React,{useState,useEffect} from 'react'
import {useHistory} from 'react-router-dom'
function Protected(props){
    let Cmp=props.Cmp
    const history = useHistory();
    useEffect(()=>{
        if(!localStorage.getItem('User-Info')) {
            history.push("/login")
        }
      },[])
    return(
        <div>
           
           <Cmp/>
        </div>
    )
}

export default Protected