import React, { useEffect,useState  } from 'react';

import packagesServices from "../../services/Packages"

function Form(){

  const [ name, setName ] = useState(null);
  const [ type, setType ] = useState(null);
  const [ location, setLocation ] = useState(null);
  const [ price, setPrice ] = useState(null);
  const [ feature, setFeature ] = useState(null);
  const [ details, setDetails ] = useState(null);

  useEffect(() => {
    async function fetchDataRol() {
      // load data from API
      const res = await employeeServices.list();
      setListRol(res.data)
    }
    fetchDataRol();
  },[]);

  const savePackages = async () => {

    const data = {
      name, type, location, price, feature, details
    }
    const res = await packagesServices.save(data);

    if (res.success) {
      alert(res.message)
    }
    else {
      alert(res.message)
    }
  }

  return(
    <div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">Name Package </label>
          <input type="text" class="form-control" placeholder="Name"
            onChange={(event)=>setName(event.target.value)} />
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="phone">Package Type </label>
          <select id="inputState" class="form-control" onChange={(event)=> setType(event.target.value)}>
             <option selected>Choose...</option>
             <option value="Dhaka">Single</option>
             <option value="Chittagong">Family</option>
             <option value="Sylhet">Couple</option>
          </select>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email">Location</label>
          <input type="email" class="form-control" placeholder="you@example.com"
            onChange={(event)=>setLocation(event.target.value)} />
        </div>
      </div>

      

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="address">Price</label>
          <input type="text" class="form-control" placeholder="1234 Main St"
            onChange={(event)=>setPrice(event.target.value)} />
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="phone">Feature </label>
          <input type="text" class="form-control" placeholder="123467890"
              onChange={(event)=>setFeature(event.target.value)}  />
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="phone">Details </label>
          <input type="text" class="form-control" placeholder="123467890"
              onChange={(event)=>setDetails(event.target.value)}  />
        </div>
      </div>

      

      <div class="row">
        <div class="col-md-6 mb-3">
          <button class="btn btn-primary btn-block" type="submit"
          onClick={()=>savePackages()}>Save</button>
        </div>
      </div>
    </div>
  )
}

export default Form;
