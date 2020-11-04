<div class="modal fade" id="create_problem" tabindex="-1" role="dialog" aria-labelledby="create_problem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Create Problem</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/problem" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="name">Problem Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter problem name" required>
                    </div>

                    <div class="form-group">
                        <label for="level">Level:</label>
                        <select name="level" class="form-control" required>
                            <option value="1">Introduction</option>
                            <option value="2">Linear Equations</option>
                            <option value="3">Conditions</option>
                            <option value="4">Loops</option>
                            <option value="5">Logic Building</option>
                            <option value="6">Vectors/Arrays</option>
                            <option value="7">References/Pointers</option>
                            <option value="8">Functions</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sub_level">Sub-Level:</label>
                        <select name="sub_level" class="form-control" required>
                            <option value="1">Beginner</option>
                            <option value="2">Novice</option>
                            <option value="3">Intermidiate</option>
                            <option value="4">Advanced</option>
                            <option value="5">Expert</option>
                        </select>
                    </div>

                    <div class="form-group">
            <label for="statement">Problem Statement:</label>
            <textarea rows="2" class="form-control" name="statement" placeholder="Enter problem statement" required></textarea>
          </div>

          <div class="form-group">
            <label for="name">Problem Description:</label>
            <textarea rows="5" class="form-control" name="description" placeholder="Enter problem description" required></textarea>
          </div>

          <div class="form-group">
            <label for="constraints">Constraints:</label>
            <textarea rows="1" class="form-control" name="constraints" placeholder="Enter constraints" required></textarea>
          </div>

          <div class="form-group">
            <label for="input_format">Input Format:</label>
            <textarea rows="2" class="form-control" name="input_format" placeholder="Enter input format" required></textarea>
          </div>

          <div class="form-group">
            <label for="output_format">Output Format:</label>
            <textarea rows="2" class="form-control" name="output_format" placeholder="Enter output format" required></textarea>
          </div>

          <div class="form-group">
            <label for="sample_input">Sample Input:</label>
            <textarea rows="2" class="form-control" name="sample_input" placeholder="Enter output format" required></textarea>
          </div>

          <div class="form-group">
            <label for="sample_output">Sample Output:</label>
            <textarea rows="2" class="form-control" name="sample_output" placeholder="Enter output format" required></textarea>
          </div>

          <div class="form-group">
            <label for="explaination">Output Explaination:</label>
            <textarea class="form-control" rows="3" name="explaination" placeholder="Enter explaination (optional)"></textarea>
          </div>

          <div class="form-group">
            <label for="hint">Hint:</label>
            <textarea rows="1" class="form-control" name="hint" placeholder="Enter hint (optional)"></textarea>
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