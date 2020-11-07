<div class="modal fade" id="edit_competition" tabindex="-1" role="dialog" aria-labelledby="edit_competition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Edit Competition</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/competition/{{$competition->id}}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="name">Competition Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$competition->name}}" placeholder="Enter Competition Name" required>
                    </div>

                    <div class="form-group">
                        <label for="competition_type">Type:</label>
                        <select name="competition_type" class="form-control" required onchange="showDiv('competition_pass', this)">
                            <option value="public" {{ ($competition->competition_type == 'public' ? "selected":"") }}>Public</option>
                            <option value="private" {{ ($competition->competition_type == 'private' ? "selected":"") }}>Private</option>
                        </select>
                    </div>

                    <div class="form-group" id="competition_pass">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="pass" value="{{$competition->password}}" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label for="starts">Starts:</label>
                        <input type="text" name="starts" value="{{$competition->starts}}"  placeholder="mm/dd/yyyy 00:00 AM" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ends">Ends:</label>
                        <input type="text" name="ends" value="{{$competition->ends}}"  placeholder="mm/dd/yyyy 00:00 AM" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function showDiv(divId, element) {
        if (element.value === "private") {
            document.getElementById(divId).style.display = 'block'
        } else {
            document.getElementById(divId).style.display = 'none'
            document.getElementById("pass").value = ''
        }
        // document.getElementById(divId).style.display = element.value === "private" ? 'block' : 'none';
    }
</script>