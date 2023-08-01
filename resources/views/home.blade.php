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
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <h1 style="margin-top: 30px; margin-bottom:30px"> Your Downline </h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>e-Mail</th>
                        <th>Register Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data2 as $item)
                    @if ($loop->first) @continue @endif
                    <tr>
                        <td>{{ $item["id"] }}</td>
                        <td>{{ $item["name"] }}</td>
                        <td>{{ $item["email"]}}</td>
                        <td>{{ substr( $item["created_at"],0,10 )}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>

 
    </div>
</div>
@endsection
