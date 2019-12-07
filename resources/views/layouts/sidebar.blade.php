@guest
    <sidebar
    ></sidebar>
@else
    <sidebar 
    :current-role="{{ $current_role }}" 
    :user-props="{{Auth::user()}}"
    ></sidebar>
@endif