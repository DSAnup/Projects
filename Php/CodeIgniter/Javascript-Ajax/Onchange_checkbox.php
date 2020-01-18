
<h4 class="heading-title"><input type="checkbox" name="" id="checkbox" onchange="hello()"> If Address is same. <a id="clearadd" onclick="clearadd()">clear</a></h4>

var che = $('input[type="checkbox"]').prop("checked", true);
                  // var nche = $('input[type="checkbox"]').prop("checked", false);
                  function hello(){

                  if(che = true){
                    var p_village = $("#p_village").val();
                    $("#g_village").val(p_village);
                    var p_post = $("#p_post").val();
                    $("#g_post").val(p_post);
                    var p_upozila = $("#p_upozila").val();
                    $("#g_upozila").val(p_upozila);
                    var p_district = $("#p_district").val();
                    $("#g_district").val(p_district);
                  }                  
                }
                function clearadd(){
                  $("#g_village").val("");
                  $("#g_post").val("");
                  $("#g_upozila").val("");
                  $("#g_district").val("");
                  $('input[type="checkbox"]').prop("checked", false);
                }