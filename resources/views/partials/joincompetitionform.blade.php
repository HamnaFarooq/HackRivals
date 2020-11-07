<div class="modal fade" id="joincompetition" tabindex="-1" role="dialog" aria-labelledby="joincompetition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Join Competition</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- form -->
                    <form action="/joincompetition" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="competition_id">Competition id:</label>
                        <input type="text" class="form-control" name="competition_id" placeholder="Enter id" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" placeholder="Enter Password" >
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">
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