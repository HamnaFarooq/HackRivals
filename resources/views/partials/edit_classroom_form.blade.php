<div class="modal fade" id="edit_classroom" tabindex="-1" role="dialog" aria-labelledby="edit_classroom" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Classroom Settings</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/classroom/{{$classroom->id}}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="name">classroom Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$classroom->name}}" placeholder="Enter classroom name" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="classroom_type">Type:</label>
                        <select name="classroom_type" class="form-control" value="{{$classroom->classroom_type}}" required>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div> -->
                    
                    <input type="hidden" name="classroom_type" value="private">

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" value="{{$classroom->password}}" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label for="starts">Starts:</label>
                        <input type="text" name="starts" value="{{$classroom->starts}}"  placeholder="mm/dd/yyyy 00:00 AM" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ends">Ends:</label>
                        <input type="text" name="starts" value="{{$classroom->ends}}"  placeholder="mm/dd/yyyy 00:00 AM" class="form-control">
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>

        </div>
    </div>
</div>