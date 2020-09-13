<div class="modal fade" id="joinpubliccompetition" tabindex="-1" role="dialog" aria-labelledby="joinpubliccompetition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Join Public Competition</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- form -->
                    <div class="form-group">
                    <label for="competition_id">Competition</label>
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for Competition" name="competition_id">
                </div>
                    <ul id="myUL" class="form-group">
                        @foreach ( $public as $competition )
                        <a href="/joincompetition/{{ $competition->id }} "><li class="form-control text-center pr-4">{{$competition->name}}</li></a>
                        @endforeach
                    </ul>

                    <script>
                        function myFunction() {
                            var input, filter, ul, li, a, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            ul = document.getElementById("myUL");
                            li = ul.getElementsByTagName("li");
                            for (i = 0; i < li.length; i++) {
                                a = li[i].getElementsByTagName("a")[0];
                                txtValue = a.textContent || a.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    li[i].style.display = "";
                                } else {
                                    li[i].style.display = "none";
                                }
                            }
                        }
                    </script>

                </div>

            </div>

    </div>
</div>
