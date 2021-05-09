import React, { useEffect, useState } from 'react';

import packagesServices from "../../services/Packages"

import { Link } from "react-router-dom";

function List(){

  const [ listPackages, setListPackages ] = useState([]);

  useEffect(()=>{

    async function fetchDataEmployee(){
      const res = await packagesServices.listPackages();
      setListPackages(res.data);
    }

    fetchDataPackages();
  },[]);

  const onClickDelete = async (i,id) => {

    var yes = confirm("are you sure to delete this item?");
    if (yes === true){

      const res = await packagesServices.delete(id)

      if (res.success) {
        alert(res.message) 
        const newList = listEmployee
        newList.splice(i,1)
        setListPackages(newList);
      }
      else{
        alert(res.message);
      }
    }

  }

  return (
    <section>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Location</th>
            <th scope="col">Price</th>
            <th scope="col">Feature</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        {
          listEmployee.map((item,i)=>{
            return(
              <tr>
                <th scope="row">{item.id}</th>
                <td>{item.package_name}</td>
                <td>{item.package_type}</td>
                <td>{item.package_location}</td>
                <td>{item.package_price}</td>
                <td>{item.package_feature}</td>
                <td>{item.package_details}</td>
                <td>
                  <Link to={"/employee/edit/"+item.id} class="btn btn-light"> Edit </Link>
                  <a href="#" class="btn btn-danger" onClick={()=>onClickDelete(i,item.id)}> Delete </a>
                </td>
              </tr>
            )
          })
        }


        </tbody>
      </table>
    </section>
  )
}

export default List;
