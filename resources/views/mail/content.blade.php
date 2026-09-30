<div>

<h1>Nuova candidatura come revisore</h1>

<h2>Nome del candidato:</h2>
<p>{{ $name }}</p>

<h2>Email del candidato:</h2>
<p>{{ $email }}</p>

<h2>Messaggio:</h2>
<p>{{ $description }}</p>

<div style="text-align: center; margin-top: 30px;">

<a
href="{{ route('make.revisor', ['email' => $email]) }}"
style="display: inline-block;padding: 15px 25px;background-color: #198754;color: white;text-decoration: none;border-radius: 10px;font-size: 18px;font-weight: bold;">
Rendi revisore
</a>
</div>
</div>