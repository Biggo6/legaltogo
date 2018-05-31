<div class="navbar-custom">
                <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <?php

                            $user_id = auth()->user()->role;
                            $perms = App\Rolepermission::where('role_id', $user_id)->orderBy('id', 'DESC')->get();
                            

                        ?>


                        <li class="has-submenu {{activeRoute('app.dashboard')}}">
                            <a href="{{route('app.dashboard')}}"><i class="md md-dashboard"></i>Dashboard</a>
                        </li>

                        @if(count($perms))
                            @foreach($perms as $p)
                                <?php
                                    $perm_id    = $p->permission_id;
                                    $perm       = App\Permission::find($perm_id);
                                    $isparent   = $perm->isparent;
                                    $isnav      = $perm->isnav;
                                    $routename  = $perm->routename;
                                    $faicon     = $perm->faicon;
                                    $permParent = $perm->permParent;
                                    //dd($perm);
                                    $childs =  App\Permission::where('permParent', $perm_id)->where('status', 1)->where('isnav', 1)->orderBy('id', 'DESC')->get();

                                ?>
                                @if($perm->status == 1 && $perm->isnav == 1)
            						
                                        
                                        @if($isparent == 1)
                                            
                                                @if(count($childs))

                                                    <?php
                                                        $activeChildRoutes = [];
                                                        foreach($childs as $c){
                                                            $arr = explode(".", $c->routename);
                                                            if($arr[1] != "edit"){
                                                                $chpid = $c->id;
                                                                if(canUserAccess($chpid)){
                                                                    $activeChildRoutes[] = $c->routename; 
                                                                }
                                                                   
                                                            }
                                                        }
                                                        //dd($activeChildRoutes);
                                                    ?>



                                                    <li class="has-submenu {{activeChildRoute($activeChildRoutes)}}" >
                                                       <a href="#"><i class="fa {{$faicon}}"></i>{{$perm->perm_name}} </a> 
                                                       <ul class="submenu">
                                                            @foreach($childs as $c)
                                                                @if(canUserAccess($c->id))
                                                                <li  class="{{activeRoute($c->routename)}}"><a href="{{route($c->routename)}}"><i class="fa {{$c->faicon}}"></i> {{$c->perm_name}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>   
                                                    </li>


                                                @else
                                                    <li class="has-submenu {{activeRoute($routename)}}">
                                                        <a href="{{route($routename)}}"><i class="fa {{$faicon}}"></i>{{$perm->perm_name}}</a>
                                                    </li>
                                                @endif
                                            
                                        @endif
                                        
                                    
                                @endif
                            @endforeach  
                        @endif

                        

                        

                    </ul>
                    <!-- End navigation menu -->
                </div>
            </div>
            </div>