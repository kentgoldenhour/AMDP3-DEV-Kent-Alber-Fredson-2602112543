$(document).ready((e) => {

  function loginvalidate() {
    
    $('#btnlog').hide();
    $('#logemail').on('change', function (e) {
      
      let loginemail = $(this).val();
      if (loginemail.length <= 0) {
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Null");
      } else if (loginemail.split("@").length !== 2){
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Don't start with '@'!");
      } else if (loginemail.split("@")[1].length === 0) {
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Don't end with '@'");
      } else if (!loginemail.split("@")[1].includes(".com")) {
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Your email doesn't contain .com");
      } else if (loginemail.split("@")[1][0] === '.') {
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Please insert domain between '@ and '.");
      } else if (loginemail.split(".")[0].length === 0) {
        $('#btnlog').hide();
        $('#logemailvali').css('color', 'red');
        $('#logemailvali').text("Invalid email : Don't start with '.'");
      } else {
        $('#logemailvali').text("Valid");
        $('#logemailvali').css('color', 'green');
      }
    });

     $('#logpass').on('change', function (e) {
      let loginpassword = $(this).val();
      if (loginpassword.length <= 0) {
        $('#btnlog').hide();
         $('#logpassvali').css('color', 'red');
        $('#logpassvali').text("Invalid password : Null");
      } else if (loginpassword.length < 6) {
        $('#btnlog').hide();
         $('#logpassvali').css('color', 'red');
        $('#logpassvali').text("Invalid password : Password must be minimum 6 characters");
      } else if (!loginpassword.match(/[0-9]/)) {
        $('#btnlog').hide();
         $('#logpassvali').css('color', 'red');
        $('#logpassvali').text("Invalid password : Password must contain at least 1 number");
      } else if (!loginpassword.match(/[A-Z]/)) {
        $('#btnlog').hide();
         $('#logpassvali').css('color', 'red');
        $('#logpassvali').text("Invalid password : Password must contain at least 1 capital letter");
      } else {
        $('#btnlog').show();
        $('#logpassvali').text("Valid");
        $('#logpassvali').css('color', 'green');
      }
    });
    
  }
  
  function forgotpasswordValidate(){
      $('#btnforgot').hide();
      $('#forgotpass').on('change', function (e) {
        let forgotpassword = $(this).val();
        if (forgotpassword.length <= 0) {
          $('#btnforgot').hide();
           $('#forgotpassvali').css('color', 'red');
          $('#forgotpassvali').text("Invalid password : Null");
        } else if (forgotpassword.length < 6) {
          $('#btnforgot').hide();
           $('#forgotpassvali').css('color', 'red');
          $('#forgotpassvali').text("Invalid password : Password must be minimum 6 characters");
        } else if (!forgotpassword.match(/[0-9]/)) {
          $('#btnforgot').hide();
           $('#forgotpassvali').css('color', 'red');
          $('#forgotpassvali').text("Invalid password : Password must contain at least 1 number");
        } else if (!forgotpassword.match(/[A-Z]/)) {
          $('#btnforgot').hide();
           $('#forgotpassvali').css('color', 'red');
          $('#forgotpassvali').text("Invalid password : Password must contain at least 1 capital letter");
        } else {
           $('#btnforgot').show();
          $('#forgotpassvali').text("Valid");
          $('#forgotpassvali').css('color', 'green');
        }
      });
  }
  
  function registervalidate(){
    $('#btnregis').hide();
    $('#regemail').on('change', function (e) {
      let regemail = $(this).val();

      if (regemail.length <= 0) {
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Null");
      } else if (regemail.split("@").length !== 2){
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Don't start with '@'!");
      } else if (regemail.split("@")[1].length === 0) {
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Don't end with '@'");
      } else if (!regemail.split("@")[1].includes(".com")) {
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Your email doesn't contain .com");
      } else if (regemail.split("@")[1][0] === '.') {
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Please insert domain between '@ and '.");
      } else if (regemail.split(".")[0].length === 0) {
        $('#btnregis').hide();
         $('#regemailvali').css('color', 'red');
        $('#regemailvali').text("Invalid email : Don't start with '.'");
      } else {
        $('#regemailvali').text("Valid");
        $('#regemailvali').css('color', 'green');
      }
    });

    $('#regusername').on('change', function (e) {
      let registerusername = $(this).val();

      if (registerusername.length <= 0) {
        $('#btnregis').hide();
        $('#reguservali').css('color', 'red');
        $('#reguservali').text("Invalid username : Null");
      } else if (registerusername.length < 5) {
        $('#btnregis').hide();
        $('#reguservali').css('color', 'red');
        $('#reguservali').text("Invalid username : Minimum 5 characters");
      } else if (!registerusername.match(/[A-z]/)) {
        $('#btnregis').hide();
        $('#reguservali').css('color', 'red');
        $('#reguservali').text("Invalid username : Username should only consist of alphabets");
      } else {
        $('#reguservali').text("Valid");
        $('#reguservali').css('color', 'green');
      }
    });

    $('#regnum').on('change', function (e) {
      let register_phone_number = $(this).val();

      if (register_phone_number.length <= 0) {
        $('#btnregis').hide();
        $('#regnumvali').css('color', 'red');
        $('#regnumvali').text("Invalid phone number : Null");
      } else if (register_phone_number.length < 10) {
        $('#btnregis').hide();
        $('#regnumvali').css('color', 'red');
        $('#regnumvali').text("Invalid phone number : Minimum 10 characters");
      } else if (!register_phone_number.match(/[0-9]/) && !register-phone-number.match('+')) {
        $('#btnregis').hide();
        $('#regnumvali').css('color', 'red');
        $('#regnumvali').text("Invalid phone number : Phone Number can only consist numbers or '+'");
      } else {
        $('#regnumvali').text("Valid");
        $('#regnumvali').css('color', 'green');
      }
    });

    let password = "";
    $('#regpass').on('change', function (e) {
      let register_password = $(this).val();
      
      if (register_password.length <= 0) {
        $('#btnregis').hide();
        $('#regpassvali').css('color', 'red');
        $('#regpassvali').text("Invalid password : Null");
      } else if (register_password.length < 6) {
        $('#btnregis').hide();
        $('#regpassvali').css('color', 'red');
        $('#regpassvali').text("Invalid password : Password must be minimum 6 characters");
      } else if (!register_password.match(/[0-9]/)) {
        $('#btnregis').hide();
        $('#regpassvali').css('color', 'red');
        $('#regpassvali').text("Invalid password : Password must contain at least 1 number");
      } else if (!register_password.match(/[A-Z]/)) {
        $('#btnregis').hide();
        $('#regpassvali').css('color', 'red');
        $('#regpassvali').text("Invalid password : Password must contain at least 1 capital letter");
      } else {
        password = register_password;
        $('#regpassvali').text("Valid");
        $('#regpassvali').css('color', 'green');
      }
    });

    $('#regconpass').on('change', function (e) {
      let confirm_password = $(this).val();
        
      if (confirm_password.length <= 0) {
        $('#btnregis').hide();
          $('#regconpassvali').css('color', 'red');
        $('#regconpassvali').text("Invalid password : Null");
      } else if (confirm_password !== password) {
        $('#btnregis').hide();
          $('#regconpassvali').css('color', 'red');
        $('#regconpassvali').text("Invalid password : Password are not the same!");
      } else {
        $('#btnregis').show();
        $('#regconpassvali').text("Valid");
        $('#regconpassvali').css('color', 'green');
      }
    });

  }

  function showDrop(){
    // $('.drop-down').hide();
    let muncul = false;
      $('#profile-name').click(e =>{
        if(muncul) $('.drop-down').fadeOut();
        else $('.drop-down').fadeIn();
        muncul = !muncul;
        
      });
  }



  loginvalidate();
  registervalidate();
  forgotpasswordValidate();
  showDrop();

  // function loadProduct(){
  //   $.ajax({
  //     method:"GET",
  //     url:"DisplayUser.php",
  //     // data: {
  //     //   search : "aaaa"
  //     // }
  //     success : (res)=>{
  //       res.forEach{(list, ID)=>{
  //         let el = $($('#table-template').html());

  //         $('#no', el).text(ID+1);
  //         $('#nama', el).text(list.username);
  //         $('#rating', el).text(list.rating);
  //         $('#category', el).text(list.category);

  //         $('#tenant-list').append(el);
  //       }}
  //     },
  //     error: (e)=>{
  //       console.log(e);
  //     }
  //   })
  // }
  // loadProduct();
  

  // nambah data ke front end
  function addCustomer(){
    $('.registerpage').submit(e => {
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "addData.php",
        data :{
          email : $('#regemail').val(),
          username : $('#regusername').val(),
          phone_number : $('#regnum').val(),
          password : $('#regpassword').val()
        },
        // success : (res) =>{
        //   if(res === "success" loadProduct());
        // }
      })
    })
  }


});
