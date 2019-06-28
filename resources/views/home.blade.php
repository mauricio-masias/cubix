@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="cms_home">
                        <a href="{{ url('/projects') }}">Projects</a>
                        <a href="{{ url('/categories') }}">Categories</a>
                        <a href="{{ url('/jobs') }}">Jobs</a>
                        <a href="{{ url('/pages') }}">Pages</a>
                        <a href="{{ url('/boxes') }}">Boxes</a>
                        <a href="{{ url('/menus') }}">Menu</a>
                        <a href="{{ url('/galleries') }}">Galleries</a>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
