<ul class="list-group sub-list">
@foreach($childs as $child)
    <li class="list-group-item child-item">
        <div>
        {{ $child->name_uz }}
        </div>
        {{-- <div></div> --}}
        <div class="text-center">{{$child->url}}</div>
        <div class="project-actions text-right">
        <a class="btn btn-info btn-sm" href="{{route('menuItem.edit', [$menu_id, $child->id])}}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
            </a>
            <a class="btn btn-danger btn-sm" href="{{route('menuItem.delete', [$menu_id, $child->id])}}">
                <i class="fas fa-trash">
                </i>
                Delete
            </a>
        </div>

    </li>
    @if($child->childs)
            @include('manageChild',['childs' => $child->childs, 'menu_id' => $menu_id])
        @endif
@endforeach

</ul>
