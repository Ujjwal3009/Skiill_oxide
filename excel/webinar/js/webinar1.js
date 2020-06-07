send = () =>{
  let name = document.querySelector('#name').value;
  let mobile = document.querySelector('#mobile').value;
  let email = document.querySelector('#email').value;
  let college = document.querySelector('#college').value;
  let course = document.querySelector('#course').value;
  let yearVal;
  let year = document.getElementsByName('year');
  for(i = 0; i < year.length;i++)
  {
      if(year[i].checked){
          yearVal = year[i].value;
      }
  }
  // alert (name+' '+mobile+' '+email+' '+college+' '+course+' '+yearVal);
  let fd = new FormData();
  fd.append('name',name);
  fd.append('mobile',mobile);
  fd.append('email',email);
  fd.append('college',college);
  fd.append('course',course);
  fd.append('yearVal',yearVal);

 
  


    fetch("webinar1.php",{
        method:"post",
        headers:{
            // "Content-Type":"application/json",
            "Accept": 'application/json',
        },
        body: fd
    }).then(res=>res.text()).then((resData)=>{
        console.log(resData);
        resData= JSON.parse(resData);
        console.log(resData);
        if(resData == "success")
        {
             alert('You have succesfully registered for the webinar. Please check mail for joining details.');
        }
        else{
        alert('Please provide complete details');
        }
        // resData = JSON.parse(resData);
        // console.log(resData);
        // if(resData=='success'){
        //     alert('Login Successful');
        //     window.location.href="internal.php";
        // }
        // else{
        //     // alert('Invalid Details');
        // }
      }).catch(err =>{
        alert(err);
    });
}
