<div class="modal fade" id="share_competition" tabindex="-1" role="dialog" aria-labelledby="share_competition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Share Competition with others</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <h5>Competition id: </h5>
                <h4 class="text-center"> {{ $competition->id }} </h4>

                @if ( $competition->competition_type == 'private' )
                <h5>Competition password:</h5>
                <h4 class="text-center">  {{ $competition->password }}</h4>
                @endif

            </div>

        </div>
    </div>
</div>