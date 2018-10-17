    @if (Auth::guard('admin')->check())
        {{"123"}}
       @else 
       {{"321"}}
    @endif