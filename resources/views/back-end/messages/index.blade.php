@extends('back-end.layout.app')

@section('title')
    {{ $PageTitle }}
@endsection


@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{ $PageTitle . ' Control' }}
        @endslot
    @endcomponent
    @if (!empty($rows))
   
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th> ID </th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Message</th>
        
                        <th class="text-right"> Processing </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $x => $row)
                        <tr>
                            <td> {{ $x + 1 }} </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->message }}</td>
                            <td class="td-actions text-right">
                                @include('back-end.shared.buttons.edit', ['routeName' => $routeName])
                                @include('back-end.shared.buttons.delete', ['routeName' => $routeName])
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
