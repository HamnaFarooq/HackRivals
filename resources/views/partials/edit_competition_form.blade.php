<div class="modal ml-sm-5  fade" id="edit_competition" tabindex="-1" role="dialog" aria-labelledby="edit_competition" aria-hidden="true">
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
                        <select name="competition_type" class="form-control" required>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" value="{{$competition->password}}" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label for="starts">Starts:</label>
                        <input type="datetime-local" name="starts" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ends">Ends:</label>
                        <input type="datetime-local" name="ends" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>
</div>