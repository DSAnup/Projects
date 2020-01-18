    <div class="col-md-12" id="dynamic">
      <div class="form-group">
        <label>Key Feature</label>
        <input type="text" name="keyName[]" class="form-control">
      </div>


    </div>
    <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br>

    <script>
      $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
          i++;
          html='<div class="form-group">'
          html+='<label>Key Feature</label>'
          html+='<input type="text" name="keyName[]" class="form-control">'
          html+='</div>'
          $('#dynamic').append(html);
        });
      });
    </script>