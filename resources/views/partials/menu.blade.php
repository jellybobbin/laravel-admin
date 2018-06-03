@if(Admin::user()->visible($item['roles']))
    @if(!isset($item['children']))
        <li>
            @if(url()->isValidUrl($item['uri']))
                <a href="{{ $item['uri'] }}" target="_blank">
                    <i class="fa {{$item['icon']}}"></i>
                    <span>{{$item['title']}}</span>
                </a>
            @else
                <a href="{{ admin_base_path($item['uri']) }}">
                    <i class="fa {{$item['icon']}}"></i>
                    <span>{{$item['title']}}</span>
                </a>
            @endif
        </li>
    @else
        <li class="treeview">
            <a href="#">
                <i class="fa {{$item['icon']}}"></i>
                <span>{{$item['title']}}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @foreach($item['children'] as $item)
                    @include('admin::partials.menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@endif