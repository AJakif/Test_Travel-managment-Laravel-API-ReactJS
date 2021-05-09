import React from "react";
import SuraiyaImage from "../../Assets/02.jpg";
const Europe = () => {
  return (
    <div>
      <div className="d-flex">
        <div class="d-flex flex-column mt-5 mr-4 ">
          <div>
            <img src={SuraiyaImage} alt="" />
          </div>
          <div>
            <h3>Germany</h3>
          </div>
          <div>
            <p>
              You can surely Love <br /> Location : Germany,Europe
            </p>
          </div>
          <div>
            <button className="btn btn-secondary">View Trip</button>
          </div>
        </div>
        <div class="d-flex flex-column mt-5 mr-4 ">
          <div>
            <img src={SuraiyaImage} alt="" />
          </div>
          <div>
            <h3>India</h3>
          </div>
          <div>
            <p>
              You can surely Love <br /> Location : India,Asia
            </p>
          </div>
          <div>
            <button className="btn btn-secondary">View Trip</button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Europe;
