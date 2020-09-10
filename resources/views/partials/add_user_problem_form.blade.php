<div class="modal fade" id="add_user_problem" tabindex="-1" role="dialog" aria-labelledby="add_user_problem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Add Problem</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/competition/{{ $competition->id }}/addproblem" method="POST" autocomplete="off">
                    @csrf

                    <input type="hidden" name="competition_id" value="{{ $competition->id }}">

                    <div class="form-group">
                        <label for="problem_id">Problem:</label>
                        <select name="problem_id" class="form-control">
                            <!-- @foreach ( $problems as $problem ) -->
                            <option value="{{ $problem->id }}"> {{ $problem->name }} </option>
                            <!-- @endforeach -->
                        </select>
                        <p class="text-muted">Create a Problem and select here</p>
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