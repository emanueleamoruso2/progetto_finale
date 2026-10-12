<x-layout>

<div class="container mt-custom mb-4">

<div class="row justify-content-center">

<div class="col-12 text-center">

<h1 class="fw-bold mb-4">

@if($category)

{{ __('messages.category_index_heading') }}
{{ __($category->name) }}

@else

{{ __('messages.all_announces_index') }}

@endif

</h1>


@if($category)

<a
href="{{ route('announce.index') }}"
class="btn btn-success rounded-4 px-4 py-2 fw-bold"
>
{{ __('messages.back_full_list') }}
</a>

@endif

</div>

</div>

</div>


<livewire:card-announce
:page="2"
:category-id="$categoryId"
/>

</x-layout>