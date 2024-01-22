<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" required placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" required placeholder="Category Slug" class="form-control input-md" wire:model="slug"/>
                                </div>
                            </div>

                
                            <div class="form-group">
                                <label class="col-md-4 control-label">Parent Category</label>
                                <div class="col-md-4">
                                    <ul class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" style="margin-left: -20px" data-bs-auto-closs="outside" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$parent_name}}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach($categories as $category)
                                                <li onmouseover="toggleSubmenu(this)" onmouseout="toggleSubmenu(this)">
                                                    <a class="dropdown-item dropdown-toggle" style="cursor: pointer;"wire:click="selectedcategory('{{$category->name}}','{{$category->id}}')" data-bs-auto-closs="outside" role="button" id="dropdownMenuButton{{$category->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                        {{$category->name}}
                                                    </a>
                                                    @if(count($category->children))
                                                        <ul class="submenu" style="display:none; position: absolute; top: 0; left: 100%; margin-top: 0;" aria-labelledby="dropdownMenuButton{{$category->id}}">
                                                            @include('livewire/admin/manage-child',['children' => $category->children])
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                      
                                    {{--<select class="form-control" required wire:model="parentCategory">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                <select class="form-control">
                                                    @if(count($category->children))
                                                        @include('livewire/admin/manage-child',['children' => $category->children])
                                                    @endif
                                                </select>
                                            
                                        @endforeach
                                    </select>--}}
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleSubmenu(li) {
            var submenu = li.querySelector('.submenu');
            if (submenu) {
                submenu.style.display = (submenu.style.display === 'none') ? 'block' : 'none'; // Toggle the display on hover
            }
        }
    </script>
</div>
