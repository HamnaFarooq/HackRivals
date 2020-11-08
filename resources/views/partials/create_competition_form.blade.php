<div class="modal fade" id="create_competition" tabindex="-1" role="dialog" aria-labelledby="create_competition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Create Competition</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/competition" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="name">Competition Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Competition Name" required>
                    </div>

                    <div class="form-group">
                        <label for="competition_type">Type:</label>
                        <select name="competition_type" class="form-control" required onchange="showDiv('competition_pass', this)">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="form-group" id="competition_pass" style="display: none;">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <label for="starts">Starts:</label>
                        <input type="datetime-local" name="starts" class="form-control" placeholder="YYYY-MM-DD HH:MM" required>
                    </div>

                    <div class="form-group">
                        <label for="ends">Ends:</label>
                        <input type="datetime-local" name="ends" class="form-control" placeholder="YYYY-MM-DD HH:MM" required>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

    </div>
</div>

<script>
    function showDiv(divId, element) {
        if(element.value === "private"){
            document.getElementById(divId).style.display = 'block'
        }
        else{
            document.getElementById(divId).style.display = 'none'
            document.getElementById("pass").value = ''
        }
        // document.getElementById(divId).style.display = element.value === "private" ? 'block' : 'none';
    }

    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>