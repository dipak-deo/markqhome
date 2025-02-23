<div id="sidebar" class="app-sidebar" data-bs-theme="dark">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
                    data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        @if(Auth::user()->image == NULL)
                        <img src="{{ url('admin/img/user/user-13.jpg') }}" alt />
                        @else 
                        <img src="{{ url(Auth::user()->image) }}" alt />
                        @endif
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                               {{ Auth::user()->first_name ?? '' }}  {{ Auth::user()->last_name ?? '' }}
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small>Software developer</small>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Send Feedback</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Helps</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{ sidebar_active(['admin.index']) }}">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                    {{-- <div class="menu-caret"></div> --}}
                </a>
               
            </div>

            <div class="menu-item has-sub {{ sidebar_active(['category.index','category.create','category.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-layer-group"></i>
                    </div>
                    <div class="menu-text">Category Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['category.create']) }}"><a href="{{ route('category.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['category.index']) }}"><a href="{{ route('category.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['post.create','post.index','post.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-signs-post"></i>
                    </div>
                    <div class="menu-text">Post Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item"><a href="{{ route('post.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item"><a href="{{ route('post.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['page.create','page.index','page.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="menu-text">Page Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['page.create']) }}"><a href="{{ route('page.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page.index']) }}"><a href="{{ route('page.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            {{-- <div class="menu-item has-sub {{ sidebar_active(['slider.index','slider.create','slider.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-sliders"></i>
                    </div>
                    <div class="menu-text">Slider Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['slider.create']) }}"><a href="{{ route('slider.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['slider.index']) }}"><a href="{{ route('slider.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div> --}}
           
            {{-- <div class="menu-item has-sub {{ sidebar_active(['team.create','team.edit','team.index','team.category.create','team.category.index','team.category.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="menu-text">Team Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['team.category.index']) }}"><a href="{{ route('team.category.index') }}" class="menu-link">
                            <div class="menu-text">Category</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['team.create']) }}"><a href="{{ route('team.create') }}" class="menu-link">
                            <div class="menu-text">Create Team</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['team.index']) }}"><a href="{{ route('team.index') }}" class="menu-link">
                            <div class="menu-text">Manage Team</div>
                        </a></div>
                </div>
            </div> --}}
           
            <div class="menu-item {{ sidebar_active(['menu.index']) }}">
                <a href="{{ route('menu.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="menu-text">Menu Management</div>
                    
                </a>
            </div>
            <div class="menu-item {{ sidebar_active(['support.index','support.show']) }}">
                <a href="{{ route('support.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="menu-text">Support Inbox</div>
                    
                </a>
            </div>
            <div class="menu-item {{ sidebar_active(['admin.contact.index','admin.contact.show']) }}">
                <a href="{{ route('admin.contact.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="menu-text">Contact Us</div>
                    
                </a>
            </div>
            <div class="menu-item {{ sidebar_active(['admin.build.quit.index','admin.build.quit.show']) }}">
                <a href="{{ route('admin.build.quit.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="menu-text">Build Quiets</div>
                    
                </a>
            </div>
            <div class="menu-item {{ sidebar_active(['admin.property.inquery.index','admin.property.inquery.show']) }}">
                <a href="{{ route('admin.property.inquery.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="menu-text">Property Inquery</div>
                    
                </a>
            </div>
           
            <div class="menu-item has-sub {{ request()->routeIs('admin.property.*')? 'active':'' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa-solid fa-home"></i>
                    </div>
                    <div class="menu-text">Property Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ request()->routeIs('admin.property.type.*')? 'active':''}}"><a href="{{ route('admin.property.type.index') }}" class="menu-link">
                            <div class="menu-text">Property Type</div>
                        </a></div>
                    <div class="menu-item {{ request()->routeIs('admin.property.category.*')? 'active':'' }}"><a href="{{ route('admin.property.category.index') }}" class="menu-link">
                            <div class="menu-text">Property Category</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.property.create']) }}"><a href="{{ route('admin.property.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ request()->routeIs('admin.property.*')? 'active':'' }} {{ sidebar_active(['admin.property.index']) }}"><a href="{{ route('admin.property.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['faq.index','faq.create','faq.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="menu-text">FAQ Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['faq.create']) }}"><a href="{{ route('faq.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['faq.index']) }}"><a href="{{ route('faq.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->routeIs('admin.testmonial.*')? 'active':'' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="menu-text">Testmonial</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['admin.testmonial.create']) }}"><a href="{{ route('admin.testmonial.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.testmonial.index']) }}"><a href="{{ route('admin.testmonial.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
           
            <div class="menu-item has-sub {{ sidebar_active(['user.index','user.create','user.edit','blocked.user','admin.all']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="menu-text">User Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['user.create']) }}"><a href="{{ route('user.create') }}" class="menu-link">
                            <div class="menu-text">Create User</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['user.index']) }}"><a href="{{ route('user.index') }}" class="menu-link">
                            <div class="menu-text">Users</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.all']) }}"><a href="{{ route('admin.all') }}" class="menu-link">
                            <div class="menu-text">Admin</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['blocked.user']) }}"><a href="{{ route('blocked.user') }}" class="menu-link">
                            <div class="menu-text">Blocked User</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ request()->routeIs('admin.home.section.*')? 'active':'' }} {{ sidebar_active(['site.setting','skipads.index','skipads.create','skipads.edit','admin.profile','admin.change.password','page_protection.index']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-gear"></i>
                    </div>
                    <div class="menu-text">Setting</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['site.setting']) }}"><a href="{{ route('site.setting') }}" class="menu-link">
                            <div class="menu-text">Site Settings</div>
                        </a></div>
                    <div class="menu-item {{ request()->routeIs('admin.home.section.*')? 'active':'' }}"><a href="{{ route('admin.home.section.index') }}" class="menu-link">
                            <div class="menu-text">Home Section</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.profile']) }}"><a href="{{ route('admin.profile') }}" class="menu-link">
                            <div class="menu-text">Update Profile</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.change.password']) }}"><a href="{{ route('admin.change.password') }}" class="menu-link">
                            <div class="menu-text">Change Password</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page_protection.index']) }}"><a href="{{ route('page_protection.index') }}" class="menu-link">
                            <div class="menu-text">Page Protection</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['skipads.index','skipads.create','skipads.edit']) }}"><a href="{{ route('skipads.index') }}" class="menu-link">
                            <div class="menu-text">Skip Ads</div>
                        </a></div>
                </div>
            </div>


            

            <div class="menu-item d-flex">
                <a href="javascript:;"
                    class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none"
                    data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>

    </div>

</div>