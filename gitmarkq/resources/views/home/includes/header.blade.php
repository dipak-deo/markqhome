<header>
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 header-left">
                    <ul>
                        <li><a href="mailto:{{ $settings->email }}"><i class="fa fa-envelope"></i>
                                {{ $settings->email }}</a></li>
                        <li><a href="javascript:;"><i class="fa fa-map-marker-alt"></i> {{ $settings->address }}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 header-right">
                    <ul>
                        <li><a href="{{ $settings->facebook_link ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $settings->twitter_link ?? '#' }}"><i
                                    class="fa-brands fa-square-x-twitter"></i></a></li>
                        <li><a href="{{ $settings->linked_in_link ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="{{ $settings->youtube_link ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                        <li class="client"><a href="#">Client Portal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if ($settings->logo)
                                <img src="{{ $settings->logo }}" alt="">
                            @endif
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                @foreach(menu('header') as $header)
                              <li class="nav-item dropdown megamenu-li dmenu ">
                                <a class="nav-link dropdown-toggle" href="#{{ $header->slug }}_{{ $header->id }}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $header->title }}</a>
                                <div class="dropdown-menu megamenu sm-menu" aria-labelledby="dropdown01">
                                  <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 megamenu-tab-menus">
                                      <h6>{{ (megha_menu_header($header->id, 1) != 0)? megha_menu_header($header->id, 1): 'Default Header'  }}</h6>
                                      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                            @foreach($header->menublock as $mkey=>$menublock)
                                          <li class="nav-item">
                                              <a class="nav-link {{ ($loop->first)? 'active':'' }}" id="{{ $menublock->slug }}-tab" data-toggle="tab" href="#{{ $menublock->slug }}" role="tab" aria-controls="{{ $menublock->slug }}" aria-selected="{{ ($loop->first)? 'true':'false' }}"><img src=" {{ url('home/images/group-items.png')}}" alt="" > {{ $menublock->block_title }}</a>
                                          </li>
                                          @endforeach
                                          @if(home_menu_buttons($header->id) !=0)
                                          <a href="{{ home_menu_buttons($header->id,1)['link']  }}" class="btn btn-freequote">{{ home_menu_buttons($header->id,1)['title']  }}</a>
                                          <a href="{{ home_menu_buttons($header->id,2)['link']  }}" class="btn btn-inquerynew">{{ home_menu_buttons($header->id,2)['title']  }} <i class="fa fa-arrow-right"></i></a>
                                       @endif
                                      </ul>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-8 col-lg-9 dash-right">
                                      <div class="tab-content" id="myTabContent">
                                        @foreach($header->menublock as $key=>$menublock)
                                          <div class="tab-pane fade {{ ($loop->first)? 'show active':'' }}" id="{{ $menublock->slug }}" role="tabpanel" aria-labelledby="{{ $menublock->slug }}-tab">
                                            <div class="row">
                                              <div class="col-12 col-sm-12 col-md-4 col-lg-4 megamenu-tab-left">
                                                <h6>{{ (megha_menu_header($header->id, 2) != 0)? megha_menu_header($header->id, 2): 'Default Header'  }}</h6>
                                                <ul>
                                                 @if(json_decode($menublock->items) !=NULL)
                                                    @foreach(json_decode($menublock->items) as $fkey=>$items)
                                                    @if($fkey <3 )
                                                        <li><a href="{{ permalink($items->type,$items->id,$items->slug) }}"><img src=" {{ url('home/images/news.png')}}" alt=""> {{ $items->title }}</a> <p>{{$items->description ?? ''}} </p></li>
                                                        @endif
                                                    @endforeach
                                                  @endif
                                                  
                                                </ul>
                                              </div>
                                              <div class="col-12 col-sm-12 col-md-4 col-lg-4 megamenu-tab-left">
                                                <h6>{{ (megha_menu_header($header->id, 3) != 0)? megha_menu_header($header->id, 3): ' '  }}</h6>
                                                <ul>
                                                  @if(json_decode($menublock->items) !=NULL)
                                                    @foreach(json_decode($menublock->items) as $skey=>$items)
                                                    @if($skey >= 3 )
                                                        <li><a href="{{ permalink($items->type,$items->id,$items->slug) }}"><img src=" {{ url('home/images/news.png')}}" alt=""> {{ $items->title }}</a> <p>{{$items->description ?? ''}}</p></li>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </ul>
                                              </div>
                                              <div class="col-12 col-sm-12 col-md-4 col-lg-4 megamenu-tab-right">
                                                <h6>Quick Links</h6>
                                                <ul>
                                                    @foreach(menu('quick-link') as $qm)
                                                    @foreach($qm->menublock as $qmb)
                                                    @if(json_decode($qmb->items) !=NULL)
                                                    @foreach(json_decode($qmb->items) as $skey=>$items)
                                                  <li><a href="{{ permalink($items->type,$items->id,$items->slug) }}">{{$items->title }}</a></li>
                                                  @endforeach
                                                  @endif
                                                  @endforeach
                                                  @endforeach
                                                </ul>
                                              </div>
                                            </div>
                                          </div>
                                        @endforeach
               
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              @endforeach
                             
                            </ul>
                          </div>
                        <div class="question-box">
                            <i class="fa fa-phone-volume"></i>
                            <h4><span>Have Any Questions?</span> 1300 0 MARKQ (62757)</h4>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    <div class="mobile-header">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <span class="clickmenus" onclick="openNav()">&#9776; </span>
              <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="mobile-menus">
                  <ul>
                    <!-- <li><a href="#">Home</a></li> -->
                    
                    @foreach(menu('header') as $header)
                    <li>
                      <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">{{ $header->title }}<i class="wsmenu-arrow fa fa-angle-down"></i></a>
                      <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                        <ul>
                            @foreach($header->menublock as $menublock)
                          <li>
                            <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">{{ $menublock->block_title }}<i class="wsmenu-arrow fa fa-angle-down"></i></a>
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                              <div class="card card-body">
                              <ul>
                                @if(json_decode($menublock->items) !=NULL)
                                @foreach(json_decode($menublock->items) as $skey=>$items)
                                <li><a href="{{ permalink($items->type,$items->id,$items->slug) }}">{{ $items->title }}</a></li>
                               @endforeach
                               @endif
                              </ul>
                            </div>
                          </li>
                            @endforeach
                        </ul>
                      </div>
                    </li>
                    @endforeach
                    
                  
                  </ul>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>


</header>
