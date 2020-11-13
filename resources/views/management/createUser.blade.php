@extends('layouts.management')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($title) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gender">{{ __('Gender') }}</label>
                                    <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                            

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="email" >{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        @if($roleid == 3)
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="grade">{{ __('Grade') }}</label>
                                <input id="grade" type="number" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') ?? 5}}" required autocomplete="grade" autofocus>
                                @error('grade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2 d-flex align-items-center">
                                <div class="form-check">
                                    <input id="hasClassroom" type="checkbox" class="form-check-input" name="hasClassroom" autofocus>
                                    <label for="hasClassroom" class="form-check-label">{{ __('This student has a classroom?') }}</label>
                                </div>
                            </div>  
                            <div class="form-group col-md-3">
                                <label for="branch">{{ __('Branch') }}</label>
                                <select id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}" required autocomplete="branch" autofocus disabled>
                                    
                                </select>
                                @error('branch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
            
                        

                        <input type="number" style="display:none;" value="{{$roleid}}" name="role_id" id="roleId">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
    let getClassroomByGrade = function(grade) {
        $.ajax({
            url: "/management/classroombygrade/" + grade.toString(),
            async: false,
            beforeSend: function(){
                $('#branch').attr('disabled', true);
                $('#grade').attr('disabled', true);
            },
            success: function(response){
                $('#branch')[0].innerHTML = response;
            },
            error: function(response){
                $('#branch')[0].innerHTML = '';
            },
            complete: function(){
                $('#branch').attr('disabled', false);
                $('#grade').attr('disabled', false);
            }
        })
    }

    $('#hasClassroom').change(function(){
        if(this.checked)
        {
            $('#branch').attr('disabled', false);
        }
        else if(!this.checked)
        {
            $('#branch').attr('disabled', true);
        }
    });

    $('#grade').on('input', function(){
        if($('#grade')[0].value >= 1 && $('#grade')[0].value <= 12){
            getClassroomByGrade($('#grade')[0].value);
        }
    });

    $('document').ready(function(){
        let value = $('#grade')[0].value
        getClassroomByGrade(value);
    });
</script>
@endsection
