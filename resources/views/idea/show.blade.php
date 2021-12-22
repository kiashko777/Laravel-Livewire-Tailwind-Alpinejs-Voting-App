<x-app-layout>
  <div>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
      </svg>
      <span class="ml-2">All ideas (or back to chosen category with filters)</span>
    </a>
  </div>

  <livewire:idea-show
    :idea="$idea"
    :votesCount="$votesCount"
  />

  <livewire:idea-comments :idea="$idea"/>

  @can('update', $idea)
    <livewire:edit-idea :idea="$idea"/>
  @endcan

  @can('delete', $idea)
    <livewire:delete-idea :idea="$idea"/>
  @endcan

  @auth
    <livewire:mark-idea-as-spam :idea="$idea"/>
  @endauth

  @admin
  <livewire:mark-idea-as-not-spam :idea="$idea"/>
  @endadmin

  <x-notification-success/>

</x-app-layout>
