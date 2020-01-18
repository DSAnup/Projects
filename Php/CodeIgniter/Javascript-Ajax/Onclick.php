<?php foreach($tutorial as $t){?>
	<li><a href="#" id="<?= $t->id?>" class="a-elem"><?= $t->title;?>
   
</a></li>

<?php }?>


<script type="text/javascript">
    
            $('.a-elem').click(function() {
                // alert($(this).text());
                var id = this.id;
                // alert(id);
                 $.ajax({
                    url:'<?= base_url()?>Front/view_tutorial',
                    type: 'post',
                    dataType: 'json',
                    data: {val: id},

                    success: function(data){

                        // alert(data.title);                        
                        html='<div class="video_tutorial_single">'
                        html+='<h4 class="tutorial_left_m_ti">'+data.title+'</h4>'
                        html+='<iframe width="100%" height="400" src="'+data.videoLink+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
                        html+='<div class="tutorial_description">'
                        html+='<h4>'+data.date+'</h4>'
                        html+='<p>'+data.brief+'</p>'
                        html+='</div>'
                        html+='</div>'
        // html+='</fieldset>'
                        $('#dynamic').html(html);


                }

            });
            });

        </script>