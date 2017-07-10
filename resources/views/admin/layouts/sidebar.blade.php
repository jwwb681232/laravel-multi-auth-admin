<?php /*echo '<pre>';print_r($adminMenus);*/?>
<div id="sidebar" class="sidebar sidebar-transparent">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="{{ asset('asset_admin/assets/img/user-13.jpg') }}" alt="" /></a>
                </div>
                <div class="info">
                    {{ auth('admin')->user()->name }}
                    <small>{{ auth('admin')->user()->email }}</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            @foreach($adminMenus as $adminMenu)
            @if(auth('admin')->user()->can($adminMenu['slug']))
            <li class="has-sub">
                <a href="javascript:;">
                    @if(isset($adminMenu['child']))
                    <b class="caret pull-right"></b>
                    @endif

                    @if(!empty($adminMenu['icon']))
                        <i class="{{ $adminMenu['icon'] }}"></i>
                    @endif
                    <span>{{ $adminMenu['name'] }}</span>
                </a>
                @if(isset($adminMenu['child']))
                <ul class="sub-menu">
                    @foreach($adminMenu['child'] as $menus)
                        @if(auth('admin')->user()->can($menus['slug']))
                            <li class="has-sub @if($menus['url'] == Request::path()) active @endif">
                                <a href="{{ url($menus['url']) }}">
                                    @if(isset($menus['child']))
                                        <b class="caret pull-right"></b>
                                    @endif
                                    {{ $menus['name'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endif
            @endforeach
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<script>
    var activeNode = $('.active');
    activeNode.parents('li').addClass('active');
</script>