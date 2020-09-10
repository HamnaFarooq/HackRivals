<div class="modal ml-sm-5  fade" id="add_test_case" tabindex="-1" role="dialog" aria-labelledby="add_test_case" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Add Test_case</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- form -->
                    <form action="/problem/{{$id}}/test_case" method="POST" autocomplete="off">
                        @csrf

                        <input type="hidden" name="problem_id" value="{{$id}}">

                        <div class="form-group">
                            <label for="input">test_case Input:</label>
                            <textarea rows="5" class="form-control" name="input" placeholder="Enter Input" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="output">test_case Output:</label>
                            <textarea rows="5" class="form-control" name="output" placeholder="Enter Output" required></textarea>
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