<div class="modal fade" id="share_classroom" tabindex="-1" role="dialog" aria-labelledby="share_classroom" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Share Class with others</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <h5>Classroom id: </h5>
                <h4 class="text-center"> {{ $classroom->id }} </h4>
                <h5>Classroom password:</h5>
                <h4 class="text-center">  {{ $classroom->password }}</h4>

            </div>

        </div>
    </div>
</div>