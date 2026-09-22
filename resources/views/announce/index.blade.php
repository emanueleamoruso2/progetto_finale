<x-layout>

<div class="container-fluid margin-container">

<div class="row justify-content-center align-items-center">

<h1 class="text-center">

@if($category)

Indice degli annunci con categoria: {{ $category->name }}

@else

Indice di tutti gli annunci

@endif

</h1>
@if($category)
<h1 class="text-center w-100 pt-5">
     <a href="{{route('announce.index')}}" class="anchor-custom">  <button class="btn btn-success rounded-4 ms-0 p-1 btn-custom w-50">Torna alla lista completa</button></a>
</h1>
 @endif

</div>

</div>

<livewire:card-announce :page="2" :category-id="$categoryId" />

</x-layout>