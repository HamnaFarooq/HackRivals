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
                        <select name="competition_type" class="form-control" required>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label for="starts">Starts:</label>
                        <input type="datetime-local" name="starts" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ends">Ends:</label>
                        <input type="datetime-local" name="ends" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif
                </form>

            </div>

        </div>

    </div>
</div>