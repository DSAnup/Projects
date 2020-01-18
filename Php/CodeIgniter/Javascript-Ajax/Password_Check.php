<div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <label>Password:</label>
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <label>Conform Password:</label>
                    <div class="form-group">
                      <input type="password" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" >
                      <span id='message'></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail :</label>
                                <div class="col-md-7 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input name="email" placeholder="E-Mail Address" id="email_validation" class="form-control" type="email" required>
                                    </div>
                                </div>
                            </div>

                <input type="submit"  id="enter" disabled="true" value="Register" class="btn btn-info btn-block">

<script type="text/javascript">
  $("#password_confirmation").keyup(function() {
  var user_pass = $("#password").val();
  var user_pass2 = $("#password_confirmation").val();
  //var enter = $("#enter").val();

  if (user_pass.length == 0) {
    alert("please fill password first");
    $("#enter").prop('disabled',true)//use prop()
  } else if (user_pass == user_pass2) {
    $("#enter").prop('disabled',false)//use prop()
    $('#message').html('Matching').css('color', 'green');
  } else {
    $("#enter").prop('disabled',true)//use prop()
    $('#message').html('Not Matching').css('color', 'red');
    // alert("Your password doesn't same");
  }

});


  $("#email_validation").blur(function(){
    var email = $("#email_validation").val();
    // alert(email);
    $.ajax({
                  url:'<?= base_url()?>Face/check_email',
                  type: 'post',
                  dataType: 'json',
                  data: {val: email},

                  success: function(data){
                    if(data == null){
                      $("#enter").prop('disabled',false)
                      
                    }else{
                      alert('Your email already register, Please another email');
                      $("#enter").prop('disabled',true)
                    }

                }

            });
  })

function checkemail(email){
      // alert(email);
      $.ajax({
                    url:'<?= base_url()?>Admin_panel/check_email',
                    type: 'post',
                    dataType: 'json',
                    data: {val: email},

                    success: function(data){
                      if(data !=''){
                      alert('This email already taken.');
                        $("#emailcheck").val('');
                        
                      }

                  }

              });
  }

  
    public function check_email(){
        $email = $this->input->post('val');
        $data = $this->Rest_model->SelectData_1('customer','*',array('email'=>$email));
        echo json_encode($data);
    }
</script>