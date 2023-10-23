<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class PaymentController extends Controller
{
    // Método para mostrar el formulario de pago
    public function showPaymentForm($id)
    {
        $pelicula = Movie::find($id);
        return view('payment', compact('pelicula'));
    }

    // Método para procesar el pago
    public function processPayment(Request $request)
    {
        // Aquí puedes integrar una pasarela de pago 

        // Supongamos que el pago fue exitoso.
        // Obtén la película y duración seleccionada
        $duration = $request->input('duration');
        $pelicula = Movie::find($request->input('pelicula_id'));

        // Simulamos un pago exitoso y actualizamos el estado de la película a "alquilada"
        if ($this->processPaymentLogic()) {
            $pelicula->update(['rented' => 1]);
            return redirect()->route('catalog.show', $pelicula->id);
        } else {
            return redirect()->route('catalog.show', $pelicula->id)->with('error', 'El pago no se pudo procesar. Por favor, inténtalo de nuevo.');
        }
    }

    // Método para simular la lógica de procesamiento de pago
    private function processPaymentLogic()
    {
        return true; // Simulamos un pago exitoso
    }
}
