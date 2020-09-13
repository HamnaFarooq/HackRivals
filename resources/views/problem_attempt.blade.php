<?php

$current = "";
$answer = "";

if (!empty($_POST)){

	$current = $_POST['cppcode'];
	$file = "hello.cpp";
	file_put_contents($file, $current);

	putenv("PATH=C:\Program Files (x86)\Dev-Cpp\MinGW64\bin");

	shell_exec("g++ hello.cpp -o hello.exe");

	$answer = shell_exec("hello.exe");

}

?>
        
        @extends('layouts.app')
        @section('content')


        <div class="container">

        <h3 class="">Problem Name</h3>
        <br>
        <div class="row">
        <div class="col-sm-9">
        <div class="bg-secondary rounded p-3">
        <p></p>
        <br>
        <h5>Description</h5>
        <p class="mx-3"></p>
        <br>
        <h5>Constraints</h5>
        <p class="mx-3"></p>
        <br>
        <h5>Input Format</h5>
        <p class="mx-3"></p>
        <br>
        <h5>Sample Input</h5>
        <p class="bg-primary m-3 p-3 rounded">
        3
        <br>
        0 10 20
        </p>
        <br>
        <h5>Output Format</h5>
        <p class="mx-3"></p>
        <br>
        <h5>Sample Output</h5>
        <p class="bg-primary m-3 p-3 rounded">30</p>
        <br>
        <h5>Explaination</h5>
        <p class="mx-3"></p>
        <br>
        <h5>Hint</h5>
        <p class="mx-3"></p>
        <br>
        </div>

        <div class="">

        <form method="get">

        <div class="form-group">
        <label for="exampleFormControlTextarea1">Write Your Code Here</label>
        <textarea class="form-control txtarea" name="cppcode" rows="25">

#include<iostream>
using namespace std;

int main(){

    return 0;
}

<?php echo $current; ?></textarea>
        <br>
        <div class="text-right"><button type="submit" class="btn btn-success">Excute Code</button></div>

        </div>



        <textarea disabled class="form-control txtarea" name="cppcode2" rows="4"><?php echo $answer; ?></textarea>



        </form>
        </div>

        </div>

        <div class="col-sm-3 text-center">
        <p> <b class="mx-3">Author:</b>  </p>
        <br>
        <p> <b class="mx-3">Difficulty:</b> Easy </p>
        <br>
        <p> <b class="mx-3">Max Points:</b>  </p>
        <br>
        <p> <b class="mx-3">Solved by:</b> 283 </p>
        </div>
        </div>

        </div>

        @endsection