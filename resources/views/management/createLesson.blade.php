@extends('layouts.management')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Lesson') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lesson.store') }}" id="form">
                        @csrf

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                            <div class="col-md-6">
                                <input id="grade" type="number" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') ?? 1}}" required autocomplete="grade" autofocus>
                                    <span class="invalid-feedbac" role="alert" id="gradeError">
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>

                                    <span class="invalid-feedbac" role="alert" id="nameError">
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    {{ __('Create Lesson') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var nameError = $('#nameError');
    var gradeError = $('#gradeError');

    $('#submit').click(function(){
        event.preventDefault();

        var grade = $('#grade').val();
        var name = $('#name').val();

        $.ajax({
            url: "{{route('lesson.store')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token()}}",
                name: name,
                grade: grade
            },
            beforeSend: function(){
                $('#submit').attr("disabled", true);
                console.log("Request has been sent!");
            },
            success: function(response){
                console.log("Response is successfull!");
            },
            error: function(response){
                var errors = response.responseJSON.errors;
                console.log(response.responseJSON);
                if(errors.name != undefined){
                    console.log('a')
                    nameError.innerText = errors.name[0];
                }
                if(errors.grade != undefined){
                    gradeError.text(errors.grade[0]); 
                    console.log(gradeError)
                }
            },
            complete: function(){
                $('#submit').attr("disabled", false);
            }
        });

    });
</script>
@endsection
