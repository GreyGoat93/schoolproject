@extends('layouts.management')

@section('content')
    <div class="container">
        <form action="#" class="mt-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="teacher">Select Teacher</label>
                    <select name="teacher" class="form-control" id="teacher">

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="lesson">Select Lesson</label>
                    <select name="lesson" class="form-control" id="lesson">
                        
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="branch">Select Branch</label>
                    <select name="branch" class="form-control" id="branch">
                        
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="minimumScore">Minimum Score</label>
                    <input name="minimumScore" type="number" class="form-control" id="minimumScore" />
                </div>
                <div class="form-group col-md-3">
                    <label for="button">Attend</label>
                    <button class="btn btn-primary form-control" id="btnSubmit">Attend</button>
                </div>
                
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: '/management/teacheroptions',
                async: false,
                error: function(response){
                    console.log(response)
                },
                success: function(response){
                    console.log(response);
                    $('#teacher')[0].innerHTML = response;
                }
            })

            $.ajax({
                url: '/management/lessonoptions',
                async: false,
                error: function(response){
                    console.log(response)
                },
                success: function(response){
                    console.log(response);
                    $('#lesson')[0].innerHTML = response;
                }
            })

            let grade = $("#lesson option:selected").data('grade');

            $.ajax({
                url: '/management/classroombygrade/' + grade,
                async: false,
                success: function(response){
                    $('#branch')[0].innerHTML = response;
                },
                error: function(response){
                    console.log(response);
                }
            });
        })

        $('#lesson').on('input', function(){
            let grade = $("#lesson option:selected").data('grade');
            
            $.ajax({
                url: "/management/classroombygrade/" + grade,
                async: false,
                success: function(response){
                    $('#branch')[0].innerHTML = response;
                },
                error: function(response){
                    console.log(response);
                }
            })
        })

        $('#btnSubmit').click(function(){
            event.preventDefault();
            
            let teacher = $('#teacher')[0].value;
            let lesson = $('#lesson')[0].value;
            let classroom = $('#branch')[0].value;
            let minimumScore = $('#minimumScore')[0].value;
            
            $.ajax({
                url: '/management/attendteacherwithlesson/',
                type: "POST",
                async: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    teacher: teacher,
                    lesson: lesson,
                    classroom: classroom,
                    minimumScore: minimumScore
                },
                success: function(response){
                    console.log(response);
                },
                error: function(response){
                    console.log(response);
                }
            });
        })
    </script>
@endsection