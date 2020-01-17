<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<!-- <style>

</style> -->
<script type="text/javascript">
</script>
</head>
<body>
<h2>Popup Chat Window</h2>
<?php 

// $dd = $_SERVER['REMOTE_ADDR'];
// echo $dd;

?>
<p id="demo"></p>
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <div class="form-container">
    <h1>Chat</h1>
    <label for="msg"><b>Message</b></label>
    <div id="chat-wrap">
      <div id="chat-area"></div>
    </div>
    <textarea placeholder="Type message.." name="msg" id="msg" required></textarea>

    <button type="submit" class="btn" onclick="msgsend()">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </div>
</div>

<script>
$('#chat-wrap').hide();
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function msgsend(){
  var msg = $("#msg").val();
  $.ajax({
         type: "POST",
         url: "action.php",
         data: {  
              data: msg,
            },
         dataType: "json",
         success: function(data){
          console.log(data)
          $('#chat-wrap').show();
          $('#chat-area').append($("<p align='right' class='rigdes'>"+ data.yourmsg +"</p>"));
          $('#chat-area').append($("<p align='left' class='lefdes'>"+ data.text +"</p>"));
          console.log(data.text.length)
          if (data.text.length == 0) {
            $('#chat-area').append($("<p align='left' class='lefdes'>"+"Sorry, can't understand you for more information "+"<a href='http://www.utshobsolutions.com/contact-information/'>"+" click here"+"</a></p>"));
          }
          $("#msg").val('');
         },
      });

}
</script>


</body>
</html>
