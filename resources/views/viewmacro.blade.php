<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
    /* background: linear-gradient(0deg, rgba(41,34,195,1) 0%, rgba(253,45,176,1) 100%);  */
    background-attachment: fixed;
    margin:0;
    font-family: "Open Sans", sans-serif;
}

#form{
    max-width: 40px;
    width:400px;
    margin:20vh auto 0 auto;
    background-color: whitesmoke;
    border-radius: 5px;
    padding:30px;
    height: 30%;
}

h1{
    text-align: center;
    color:rgba(253,45,176,1);
}

#form button{
    background-color:rgba(253,45,176,1);
    color:white;
    border: 1px solid rgba(253,45,176,1);
    border-radius: 5px;
    padding:10px;
    margin:20px 0px;
    cursor:pointer;
    font-size:20px;
    width:100%;
}

.input-group{
    display:flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.input-group input{
    border-radius: 5px;
    font-size:20px;
    margin-top:5px;
    padding:10px;
    border:1px solid rgba(41,34,195,1) ;
}

.input-group input:focus{
    outline:0;
}

.input-group .error{
    color:rgb(242, 18, 18);
    font-size:16px;
    margin-top: 5px;
}

.input-group.success input{
    border-color: #0cc477;
}

.input-group.error input{
    border-color:rgb(206, 67, 67);
}
    </style>
</head>
<body>
       {{-- <x-app-layout>  
        <x-slot name="header">   --}}
            @include('layouts.adminapp')
            <div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            </h2>
        {{-- </x-slot> --}}
           <div class="py-5">
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="form-group">
                              <label for="bank_name">Bank Name</label>
                              {{ Form::selectBank("bank_name", $merchant['paymentInfo']->bank_name ?? null,["class"=>"form-control"]) }}
                     </div>
            </div>
        </div>


    {{-- </x-app-layout> --}}
    <script>
        const form = document.querySelector('#form')
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const cpassword = document.querySelector('#cpassword');

form.addEventListener('submit',(e)=>{
        
    if(!validateInputs()){
        e.preventDefault();
    }
})

function validateInputs(){
    const usernameVal = username.value.trim()
    const emailVal = email.value.trim();
    const passwordVal = password.value.trim();
    const cpasswordVal = cpassword.value.trim();
    let success = true

    if(usernameVal===''){
        success=false;
        setError(username,'Username is required')
    }
    else{
        setSuccess(username)
    }

    if(emailVal===''){
        success = false;
        setError(email,'Email is required')
    }
    else if(!validateEmail(emailVal)){
        success = false;
        setError(email,'Please enter a valid email')
    }
    else{
        setSuccess(email)
    }

    if(passwordVal === ''){
        success= false;
        setError(password,'Password is required')
    }
    else if(passwordVal.length<8){
        success = false;
        setError(password,'Password must be atleast 8 characters long')
    }
    else{
        setSuccess(password)
    }

    if(cpasswordVal === ''){
        success = false;
        setError(cpassword,'Confirm password is required')
    }
    else if(cpasswordVal!==passwordVal){
        success = false;
        setError(cpassword,'Password does not match')
    }
    else{
        setSuccess(cpassword)
    }

    return success;

}
//element - password, msg- pwd is reqd
function setError(element,message){
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error')

    errorElement.innerText = message;
    inputGroup.classList.add('error')
    inputGroup.classList.remove('success')
}

function setSuccess(element){
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error')

    errorElement.innerText = '';
    inputGroup.classList.add('success')
    inputGroup.classList.remove('error')
}

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };
    </script>
    </div>
    @include('layouts.adminappfooter')

</body>
</html>
