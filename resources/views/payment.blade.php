@extends('layouts.master')
@section('title', 'Pago de Película')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pago de Película - {{ $pelicula->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payment.process') }}">
                        @csrf

                        <div class="form-group">
                            <label for="card_number">Número de Tarjeta</label>
                            <input type="text" name="card_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="expiration_date">Fecha de Expiración</label>
                            <input type="text" name="expiration_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duración</label>
                            <select name="duration" class="form-control" required>
                                <option value="1">1 mes - $5</option>
                                <option value="5">5 meses - $20</option>
                                <option value="12">1 año - $45</option>
                            </select>
                        </div>

                        <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">

                        <button type="submit" class="btn btn-primary">Procesar Pago</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
