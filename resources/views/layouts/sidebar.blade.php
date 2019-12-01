@guest

@else
    <sidebar :current-role="{{ $current_role }}" :user-props="{{Auth::user()}}"></sidebar>
@endif