@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Contacts</h1>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Team ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>
                @if($contacts->count())
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->team_id }}</td>
                            <td>{{ $contact->first_name ?: '-' }}</td>
                            <td>{{ $contact->last_name ?: '-' }}</td>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="5" class="text-center">There are no contacts at the moment</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
