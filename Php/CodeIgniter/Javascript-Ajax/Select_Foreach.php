
<div class="col-md-12">
  <div class="form-group">
    <label>Category Name</label>
    <select class="form-control" onchange="ss(this.value)">

      <option value="">Choose Service</option>
      <?php foreach($category as $catg){?>
        <option value="<?= $catg->id?>"><?= $catg->cat_name;?></option>
      <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label>Sub Category Name</label>
    <select class="form-control" name="photo_subcategory_id" id="dynamic">



    </select>
  </div>
</div>

<?php $this->load->view('footer_c');?>
<script type="text/javascript">
  function ss(id){
    $.ajax({
      url:'<?= base_url()?>Admin_panel/view_subcategory',
      type: 'post',
      dataType: 'json',
      data: {val: id},

      success: function(data){
        html = '';
        $.each(data, function(key, value) {
          html+='<option value="'+value.id +'">'+value.subcat_name+'</option>';
          $('#dynamic').html(html);
        });

      }

    });
  }
</script>

<?php
public function view_subcategory(){
  $id = $this->input->post('val');
  $data = $this->Rest_model->SelectData('photo_subcategory','*',array('phto_category_id'=>$id));
  echo json_encode($data);
}