<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Codeigniter page scroll load more </title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
<div class="alert alert-info" style="position: fixed; width: 1140px";>
<h1 style="color: #000000;">Codeigniter load more data on click article</h1>
<small>By vikram parihar <a href="http://webrocom.net">webrocom.net</a> </small>
</div>
</div>
<div class="container" style="margin-top: 120px;">
<h3>Ajax country list</h3>
<table class="table">
<thead>
<tr><th>SN</th><th>Country name</th><th>Country code</th></tr>
</thead>
<tbody id="ajax_table">
</tbody>
</table>
<div class="container" style="text-align: center"><button class="btn" id="load_more" data-val = "0">Load more..
    <img style="display: none" id="loader" src="<?php echo str_replace('index.php','',base_url()) ?>asset/loader.GIF"> </button></div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
getcountry(0);
$("#load_more").click(function(e){
e.preventDefault();
var page = $(this).data('val');
getcountry(page);
});
});
var getcountry = function(page){
$("#loader").show();
$.ajax({
url:"<?php echo base_url() ?>Front/getCountry",
type:'GET',
data: {page:page}
}).done(function(response){
$("#ajax_table").append(response);
$("#loader").hide();
$('#load_more').data('val', ($('#load_more').data('val')+1));
scroll();
});
};
var scroll  = function(){
$('html, body').animate({
scrollTop: $('#load_more').offset().top
}, 1000);
};
</script>
</body>
</html>




    public function getCountry($page){
        $offset = 10*$page;
        $limit = 10;
        $sql = "select * from country limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
        }

        
    public function getCountry(){
        $page =  $_GET['page'];
        // $this->load->model('welcome_model');
        $img = base_url();
        $countries = $this->Admin_model->getimage($page);
        foreach($countries as $country){
        echo '<tr style="color:red;"><td>'.$country->id."</td><td>".$country->name."</td><td>".'<img src="'.$img.'uploads/image_gallery/'.$country->image.'"/>'."</td></tr>";
        }
        exit;
        }