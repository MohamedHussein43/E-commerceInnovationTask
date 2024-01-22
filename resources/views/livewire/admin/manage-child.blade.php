@foreach($children as $category)        
    <li onmouseover="toggleSubmenu(this)" onmouseout="toggleSubmenu(this)">
        <a class="dropdown-item dropdown-toggle" wire:click="selectedcategory('{{$category->name}}','{{$category->id}}')" style="cursor: pointer;" data-bs-auto-closs="outside" role="button" id="dropdownMenuButton{{$category->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            {{$category->name}}
        </a>
        @if(count($category->children))
            <ul class="submenu" style="display:none; position: absolute; top: {{($loop->iteration-1)*20 }}px; left: 100%; margin-top: 0;" aria-labelledby="dropdownMenuButton{{$category->id}}">
                @include('livewire/admin/manage-child',['children' => $category->children])
            </ul>
        @endif
    </li>              
@endforeach

<script>
    function toggleSubmenu(li) {
        var submenu = li.querySelector('.submenu');
        if (submenu) {
            submenu.style.display = (submenu.style.display === 'none') ? 'block' : 'none'; // Toggle the display on hover
        }
    }
</script>
