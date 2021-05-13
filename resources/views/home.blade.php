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

                    {{ __('Welcome!') }} &nbsp <a href="{{ route('view-profile') }}">View profile</a>

                    <hr>

                    <div class="container border border-info" style="padding: 20px 20px;">

                        <h4 class="text-center text-bold">FAKE POSTS</h4>

                        @if (session('alert-faking-record'))
                            @php $alert = session('alert-faking-record') @endphp
                            <x-alert type="success" :message="$alert"/>
                        @endif


                        <form action="{{ route('fake-posts') }}" method="GET">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-sm-6">
                                    <label>Enter number of posts to fake</label>
                                    <input type="number" name="number_of_posts" class="form-control" value="100" required>
                                </div>
                                <div class="col-lg-8 col-sm-6">
                                    <label>Action: Fake posts </label> <br>
                                    <button type="submit" name="eager_loaded" value="false" class="btn btn-success">Without eager loading</button>
                                    <button type="submit" name="eager_loaded" value="true" class="btn btn-success">With eager loading </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>

                    <div class="container border border-info mt-4" style="padding: 20px 20px;">

                        <h4 class="text-center text-bold">ACTIONS TO TEST USAGE OF ELOQUENT</h4>

                        @if (session('alert-quering-record'))
                            @php $alert = session('alert-quering-record') @endphp
                            <x-alert type="success" :message="$alert"/>
                        @endif

                        @if (session('alert-deleting-record'))
                            @php $alert = session('alert-deleting-record') @endphp
                            <x-alert type="danger" :message="$alert"/>
                        @endif

                        @if (session('alert-updating-record'))
                            @php $alert = session('alert-updating-record') @endphp
                            <x-alert type="warning" :message="$alert"/>
                        @endif

                        <div class="container border border-success" style="padding: 10px 10px">
                            <h5><b>Data querying:</b></h5>
                            <hr>
                            <form action="{{ route('query-posts') }}" method="GET">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Query data using relationship without eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="false" class="btn btn-success btn-sm">Query</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Query data using relationship with eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="true" class="btn btn-success btn-sm">Query</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="container border border-warning mt-4" style="padding: 10px 10px">
                            <h5><b>Data Updating:</b></h5>
                            <hr>
                            <form action="{{ route('update-posts') }}" method="GET">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Update data using relationship without eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="false" class="btn btn-warning btn-sm">Update</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Update data using relationship with eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="true" class="btn btn-warning btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="container border border-danger mt-4" style="padding: 10px 10px">
                            <h5><b>Data deletion:</b></h5>
                            <hr>
                            <form action="{{ route('delete-posts') }}" method="GET">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Delete data using relationship without eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="false" class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-6">
                                        <p>Delete data using relationship with eager loading</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <button type="submit" name="eager_loaded" value="true" class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
