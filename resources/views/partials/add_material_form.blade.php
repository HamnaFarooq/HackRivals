<div class="modal fade" id="add_material" tabindex="-1" role="dialog" aria-labelledby="add_material" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Add Material</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/classroom/{{$classroom->id}}/class_material" method="POST" autocomplete="off">
                    @csrf

                    <input type="hidden" class="form-control" name="classroom_id" value="{{$classroom->id}}" required>

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                    </div>

                    <div class="form-group">
                        <label for="announcement">Announcement:</label>
                        <textarea rows="3" class="form-control" name="announcement" placeholder="Enter announcement" required> </textarea>
                        <p class="text-muted">( Optional )</p>
                    </div>

                    <div class="form-group">
                        <label for="competition_id">Competition:</label>
                        <select name="competition_id" class="form-control">
                            <option value="">No Competition</option>
                            @foreach ( $competitions as $competition )
                            <option value="{{ $competition->id }}"> {{ $competition->name }} </option>
                            @endforeach
                        </select>
                        <p class="text-muted">( Optional )  Create a private Competition and select one</p>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
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