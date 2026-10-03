<x-layout>
<div class="container-fluid margin-container">
<div class="row justify-content-center align-items-center">
<h1 class="text-center">
@if($category)
{{ __('messages.category_index_heading') }} {{ __($category->name) }}
@else
{{ __('messages.all_announces_index') }}
@endif
</h1>
@if($category)
<h1 class="text-center w-100 pt-5"><a href="{{ route('announce.index') }}" class="anchor-custom"><button class="btn btn-success rounded-4 ms-0 p-1 btn-custom w-50">{{ __('messages.back_full_list') }}</button></a></h1>
@endif
</div>
</div>
<livewire:card-announce :page="2" :category-id="$categoryId" />
</x-layout>
