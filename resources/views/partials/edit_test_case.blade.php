<div class="modal fade" id="edit_{{$test_case->id}}" tabindex="-1" role="dialog" aria-labelledby="add_test_case" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Edit Test_case</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/problem/{{$id}}/test_case/{{$test_case->id}}" method="POST">
                    @csrf
                    @method('patch')

                    <input type="hidden" name="problem_id" value="{{$id}}">

                    <div class="form-group">
                        <label for="input">test_case Input:</label>
                        <textarea rows="3" class="form-control" name="input" placeholder="Enter Input" required>{{$test_case->input}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="output">test_case Output:</label>
                        <textarea rows="3" class="form-control" name="output" placeholder="Enter Output" required>{{$test_case->output}}</textarea>
                    </div>
                    <input type="hidden" name="problem_id" value="{{$id}}">

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