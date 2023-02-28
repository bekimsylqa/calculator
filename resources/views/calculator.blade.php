@extends('layouts.app')

@section('content')
<div class="calculator-container">
    <h1>Calculator</h1>
    <div class="calculator-form">
        <form method="post" action="{{ route('calculator.store') }}">
            @csrf
            <input type="text" name="expression" value="{{ $expression ?? '' }}" required>
            <button type="submit">Calculate</button>
        </form>
        @if(isset($result))
            <h2>Result: {{ $result }}</h2>
        @endif
    </div>
    <div class="calculator-table">
        <h2>Saved Calculations</h2>
        <table>
            <thead>
            <tr>
                <th>Expression</th>
                <th>Result</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($calculations as $calculation)
                <tr>
                    <td>{{ $calculation->expression }}</td>
                    <td>{{ $calculation->result }}</td>
                    <td>{{ $calculation->created_at }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
    <div class="pagination">
        {{ $calculations->links() }}
    </div>
</div>
@endsection

