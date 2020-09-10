<div class="modal ml-sm-5  fade" id="edit_material" tabindex="-1" role="dialog" aria-labelledby="edit_material" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Edit Material</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/classroom/{{$classroom->id}}/class_material/{{$material->id}}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{$material->title}}" placeholder="Enter Title" required>
                    </div>

                    <div class="form-group">
                        <label for="announcement">Announcement (optional):</label>
                        <input type="textarea" rows="40" class="form-control" name="announcement" value="{{$material->announcement}}" placeholder="Enter announcement" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="announcement">Competition (optional):</label>
                        <button class="btn btn-secondary">Create Competition</button>
                    </div> -->

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