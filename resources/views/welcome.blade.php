<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel twilio bulk SMS</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container" style="margin-top:50px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="color:#fff;background-color:green;">
                        <div class="card-header" style="border-bottom:2px solid #ffc107">{{ __('Send Bulk SMS') }}</div>
        
                        <div class="card-body">
                            @include('layout.alerts')
                            <form method="POST" action="{{ route('send') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="numbers" class="col-md-4 col-form-label text-md-right">{{ __('Enter numbers') }}</label>
        
                                    <div class="col-md-8">
                                        <textarea id="numbers" cols="50" rows="7" placeholder="Enter numbers in international format and in comma seperated values. eg. +1234567890,+2323232320" class="form-control{{ $errors->has('numbers') ? ' is-invalid' : '' }}" name="numbers" value="{{ old('numbers') }}" required autofocus></textarea>
        
                                        @if ($errors->has('numbers'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('numbers') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
        
                                    <div class="col-md-8">
                                        <textarea id="message" placeholder="Enter your message here.." cols="50" rows="10" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" required></textarea>
        
                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-warning">
                                            {{ __('Send SMS') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
