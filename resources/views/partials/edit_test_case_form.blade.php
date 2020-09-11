<div class="modal fade" id="edit_test_case" tabindex="-1" role="dialog" aria-labelledby="edit_test_case" aria-hidden="true">
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

                    <div class="form-group">
                        <label for="input">test_case Input:</label>
                        <textarea rows="5" class="form-control" name="input" value="{{$test_case->input}}" placeholder="Enter Input" required>
                    </div>

                    <div class="form-group">
                        <label for="output">test_case Output:</label>
                        <textarea rows="5" class="form-control" name="output" value="{{$test_case->output}}" placeholder="Enter Output" required>
                    </div>

                    <input type="hidden" name="problem_id" value="{{$id}}">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

    </div>
</div>