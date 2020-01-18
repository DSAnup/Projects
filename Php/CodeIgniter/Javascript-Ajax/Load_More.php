<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Image Gallery</h2>
  <p>The .thumbnail class can be used to display an image gallery.</p>
  <p>The .caption class adds proper padding and a dark grey color to text inside thumbnails.</p>
  <p>Click on the images to enlarge them.</p>
  <div class="row" id="portfolio-item">
    
  </div>
  <div class="container" style="text-align: center"><button class="btn" id="load_more" data-val = "0">Load more..
    <img style="display: none" id="loader" src="<?php echo str_replace('index.php','',base_url()) ?>asset/loader.GIF"> </button></div>
</div>
</div>

</body>
</html>




<script>
$(document).ready(function(){
getimage(0);
$("#load_more").click(function(e){
e.preventDefault();
var page = $(this).data('val');
getimage(page);
});
});
var getimage = function(page){
$("#loader").show();
$.ajax({
url:"<?php echo base_url() ?>Front/getimage",
type:'GET',
data: {page:page}
}).done(function(response){
$("#portfolio-item").append(response);
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



Controller

public function getimage(){
        $page =  $_GET['page'];
        // $this->load->model('welcome_model');
        $img = base_url();
        $countries = $this->Admin_model->getimage($page);

        foreach($countries as $ig){
            echo '<div class="col-md-4">
      <div class="thumbnail">
        <a href="'.$img.'uploads/image_gallery/'.$ig->image.'" target="_blank">
          <img src="'.$img.'uploads/image_gallery/'.$ig->image.'" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>';
        }
        exit;
        }



Model

public function getimage($page){
        $offset = 3*$page;
        $limit = 3;
        $sql = "select * from image_gallery limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
        }