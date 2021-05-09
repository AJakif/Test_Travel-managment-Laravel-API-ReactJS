import React from "react";
const Registration = () => {


    return (
          <div className="container">
            <h1> Registration </h1>
            <div className="card">
                <div className="card-body">
                               <form>
   
  <div class="mb-3">
    <label  class="form-label">FullName</label>
    <input type="text" class="form-control"  />
    
                        </div>
                        
                         
  <div class="mb-3">
    <label  class="form-label">UserName</label>
    <input type="text" class="form-control"  />
    
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control"  />
    
                        </div>
                         <div class="mb-3">
    <label  class="form-label">Phone</label>
    <input type="number" class="form-control"  />
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"/>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
                </div>
                
                
                
 </div>
        </div>
    );




};

export default Registration;