<div class="modal fade" id="add_problem" tabindex="-1" role="dialog" aria-labelledby="add_problem" aria-hidden="true">
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

                <div class="form-group">
                    <label for="problem_id">Problem</label>
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for Problems" name="problem_id">
                </div>
                    <ul id="myUL" class="form-group">
                        @foreach ( $hackrivalprob as $problem )
                        <li class="form-control"><a href="/competition/{{ $competition->id }}/addproblem/{{ $problem->id }}">{{$problem->name}}</a></li>
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