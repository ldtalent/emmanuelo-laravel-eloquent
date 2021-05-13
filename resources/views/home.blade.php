@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr>

                    <h4>Fake posts</h4>

                    @if (session('alert-faking-record'))
                        @php $alert = session('alert-faking-record') @endphp
                        <x-alert type="success" :message="$alert"/>
                    @endif


                    <form action="{{ route('fake-posts') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-sm-6">
                                <label>Enter number of posts to fake</label>
                                <input type="number" name="number_of_posts" class="form-control" value="100" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label>Action</label> <br>
                                <button type="submit" class="btn btn-success">Fake posts</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
